(function (factory) {
  if (typeof define === 'function' && define.amd) {
    define('CustData', [], factory);
  } else {
    factory();
  }
})(function () {
  var CustData = {};
  $.ajaxSetup({
    async:false
  });
  comm.GET({
    url : '/setup/customer/get_cust_picker',
    success  :function (resp) {
      if ( resp.status ) CustData = resp.data;
    }
  })

  if (typeof window !== 'undefined') {
    window.CustData = CustData;
  }

  return CustData;

});

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as anonymous module.
    define(['jquery', 'CustData'], factory);
  } else if (typeof exports === 'object') {
    // Node / CommonJS
    factory(require('jquery'), require('CustData'));
  } else {
    // Browser globals.
    factory(jQuery, CustData);
  }
})(function ($, CustData) {
  'use strict';

  if (typeof CustData === 'undefined') {
    throw new Error('数据未加载...');
  }

  var NAMESPACE = 'custpicker';
  var EVENT_CHANGE = 'change.' + NAMESPACE;
  var PROVINCE = 'province';
  var CIRY = 'city';
  var DISTRICT = 'district';

  function Custpicker(element, options) {
    this.$element = $(element);
    this.options = $.extend({}, Custpicker.DEFAULTS, $.isPlainObject(options) && options);
    this.placeholders = $.extend({}, Custpicker.DEFAULTS);
    this.active = false;
    this.init();
  }

  Custpicker.prototype = {
    constructor: Custpicker,
    // 初始化
    init: function () {
      var options = this.options;
      var $select = this.$element.find('select');
      var length = $select.length;
      var data = {};

      $select.each(function () {
        $.extend(data, $(this).data());
      });

      $.each([PROVINCE, CIRY, DISTRICT], $.proxy(function (i, type) {
        if (data[type]) {
          options[type] = data[type];
          this['$' + type] = $select.filter('[data-' + type + ']');
        } else {
          this['$' + type] = length > i ? $select.eq(i) : null;
        }
      }, this));
      // 事件绑定
      this.bind();
      //
      this.reset();

      this.active = true;
    },

    bind: function () {
      if (this.$province) {
        this.$province.on(EVENT_CHANGE, (this._changeProvince = $.proxy(function () {
          this.output(CIRY);
          this.output(DISTRICT);
        }, this)));
      }

      if (this.$city) {
        this.$city.on(EVENT_CHANGE, (this._changeCity = $.proxy(function () {
          this.output(DISTRICT);
        }, this)));
      }
    },
    // 事件解绑
    unbind: function () {
      if (this.$province) {
        this.$province.off(EVENT_CHANGE, this._changeProvince);
      }

      if (this.$city) {
        this.$city.off(EVENT_CHANGE, this._changeCity);
      }
    },
    // 数据输出
    output: function (type) {
      var options = this.options;
      var placeholders = this.placeholders;
      var $select = this['$' + type];
      var districts = {};
      var data = [];
      var code;
      var matched;
      var value;

      if (!$select || !$select.length) {
        return;
      }

      value = options[type];

      code = (
        type === PROVINCE ? 86 :
        type === CIRY ? this.$province && this.$province.find(':selected').data('code') :
        type === DISTRICT ? this.$city && this.$city.find(':selected').data('code') : code
      );

      districts = $.isNumeric(code) ? CustData[code] : null;

      if ($.isPlainObject(districts)) {
        $.each(districts, function (code, address) {
          var selected = address === value;

          if (selected) {
            matched = true;
          }

          data.push({
            code: code,
            address: address,
            selected: selected
          });
        });
      }

      if (!matched) {
        if (data.length && (options.autoSelect || options.autoselect)) {
          data[0].selected = true;
        }

        // Save the unmatched value as a placeholder at the first output
        if (!this.active && value) {
          placeholders[type] = value;
        }
      }

      // Add placeholder option
      if (options.placeholder) {
        data.unshift({
          code: '',
          address: placeholders[type],
          selected: false
        });
      }
      $select.html(this.getList(data)).val("").trigger('change');
      //$select.html(this.getList(data));
    },

    getList: function (data) {
      var list = [];

      $.each(data, function (i, n) {
        list.push(
          '<option' +
          ' value="' + (n.address && n.code ? n.code : '') + '"' +
          ' data-code="' + (n.code || '') + '"' +
          (n.selected ? ' selected' : '') +
          '>' +
            (n.address || '') +
          '</option>'
        );
      });

      return list.join('');
    },

    reset: function (deep) {
      if (!deep) {
        this.output(PROVINCE);
        this.output(CIRY);
        this.output(DISTRICT);
      } else if (this.$province) {
        this.$province.find(':first').prop('selected', true).trigger(EVENT_CHANGE);
      }
    },

    destroy: function () {
      this.unbind();
      this.$element.removeData(NAMESPACE);
    }
  };

  Custpicker.DEFAULTS = {
    autoSelect: true,
    placeholder: true,
    province: '--所属公司--',
    city: '--所属客户--',
    district: '--区--'
  };

  Custpicker.setDefaults = function (options) {
    $.extend(Custpicker.DEFAULTS, options);
  };

  Custpicker.other = $.fn.custpicker;

  $.fn.custpicker = function (option) {
    var args = [].slice.call(arguments, 1);

    return this.each(function () {
      var $this = $(this);
      var data = $this.data(NAMESPACE);
      var options;
      var fn;

      if (!data) {
        if (/destroy/.test(option)) {
          return;
        }

        options = $.extend({}, $this.data(), $.isPlainObject(option) && option);
        $this.data(NAMESPACE, (data = new Custpicker(this, options)));
      }

      if (typeof option === 'string' && $.isFunction(fn = data[option])) {
        fn.apply(data, args);
      }
    });
  };

  $.fn.custpicker.Constructor = Custpicker;
  $.fn.custpicker.setDefaults = Custpicker.setDefaults;

  $.fn.custpicker.noConflict = function () {
    $.fn.custpicker = Custpicker.other;
    return this;
  };

  $(function () {
    $('[data-toggle="custpicker"]').custpicker();
  });
});

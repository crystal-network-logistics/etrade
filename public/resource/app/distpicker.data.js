/*!
 * Distpicker v1.0.4
 * https://github.com/fengyuanchen/distpicker
 *
 * Copyright (c) 2014-2016 Fengyuan Chen
 * Released under the MIT license
 *
 * Date: 2016-06-01T15:05:52.606Z
 */

(function (factory) {
  if (typeof define === 'function' && define.amd) {
    // AMD. Register as anonymous module.
    define('RegionsData', [], factory);
  } else {
    // Browser globals.
    factory();
  }
})(function () {

  var RegionsData = {};

  $.ajaxSetup({
    async:false
  });

  comm.GET({
    url : '/archives/locations/get_district_data',
    success  :function (resp) {
      if ( resp.status ) RegionsData = resp.data;
    }
  })

  if (typeof window !== 'undefined') {
    window.RegionsData = RegionsData;
  }

  return RegionsData;

});

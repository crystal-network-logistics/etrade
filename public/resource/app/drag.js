$.fn.extend({
    dragging: function(data) {
        var $this = $(this);
        var xPage;
        var yPage;
        var X;
        var Y;
        var xRand = 0;
        var yRand = 0;
        var father = $this.parent();
        var defaults = {
            move: 'both',
            randomPosition: true,
            hander: 1
        }
        var opt = $.extend({},
            defaults, data);
        var move_position = opt.move;
        var random = opt.randomPosition;
        var hander = opt.hander;
        if (hander == 1) {
            hander = $this;
        } else {
            hander = $this.find(opt.hander);
        }
        father.css({
            "position": "relative",
            "overflow": "hidden"
        });
        $this.css({
            "position": "absolute"
        });
        hander.css({
            "cursor": "move"
        });
        var faWidth = father.width();
        var faHeight = father.height();
        var thisWidth = $this.width() + parseInt($this.css('padding-left')) + parseInt($this.css('padding-right'));
        var thisHeight = $this.height() + parseInt($this.css('padding-top')) + parseInt($this.css('padding-bottom'));
        var mDown = false;
        var positionX;
        var positionY;
        var moveX;
        var moveY = 200;
        if (random) {
            $thisRandom();
        }
        function $thisRandom() {
            $this.each(function(index) {
                var randY = 120;//parseInt(Math.random() * (faHeight - thisHeight));
                var randX = 120;//parseInt(Math.random() * (faWidth - thisWidth));
                if (move_position.toLowerCase() == 'x') {
                    $(this).css({
                        left: randX
                    });
                } else if (move_position.toLowerCase() == 'y') {
                    $(this).css({
                        top: randY
                    });
                } else if (move_position.toLowerCase() == 'both') {
                    $(this).css({
                        top: randY?randY:200,
                        left: randX?randX:200
                    });
                }
            });
        }
        hander.mousedown(function(e) {
            father.children().css({
                "zIndex": "0"
            });
            $this.css({
                "zIndex": "1"
            });
            mDown = true;
            X = e.pageX;
            Y = e.pageY;
            positionX = $this.position().left;
            positionY = $this.position().top;
            return false;
        });
        $(document).mouseup(function(e) {
            mDown = false;
        });
        $(document).mousemove(function(e) {
            xPage = e.pageX;
            moveX = positionX + xPage - X;
            yPage = e.pageY;
            moveY = positionY + yPage - Y;
            function thisXMove() {
                if (mDown == true) {
                    $this.css({
                        "left": moveX
                    });
                } else {
                    return;
                }
                if (moveX < 0) {
                    $this.css({
                        "left": "0"
                    });
                }
                if (moveX > (faWidth - thisWidth)) {
                    $this.css({
                        "left": faWidth - thisWidth
                    });
                }
                return moveX;
            }
            function thisYMove() {
                if (mDown == true) {
                    $this.css({
                        "top": moveY?moveY:100
                    });
                } else {
                    return;
                }
                if (moveY < 0) {
                    $this.css({
                        "top": 200
                    });
                }
                if (moveY > (faHeight - thisHeight)) {
                    $this.css({
                        "top": faHeight - thisHeight
                    });
                }
                return moveY;
            }
            function thisAllMove() {
                if (mDown == true) {
                    $this.css({
                        "left": moveX,
                        "top": moveY?moveY:200
                    });
                } else {
                    return;
                }
                if (moveX < 0) {
                    $this.css({
                        "left": "0"
                    });
                }
                if (moveX > (faWidth - thisWidth)) {
                    $this.attr('L',faWidth - thisWidth);
                    $this.css({
                        "left": faWidth - thisWidth
                    });
                }
                if (moveY < 0) {
                    $this.css({
                        "top": 200
                    });
                }
                if (moveY > (faHeight - thisHeight)) {
                    $this.attr('T',faHeight - thisHeight);
                    $this.css({
                        "top": (faHeight - thisHeight)?(faHeight - thisHeight):moveY
                    });
                }
            }

            if (move_position.toLowerCase() == "x") {
                thisXMove();
            } else if (move_position.toLowerCase() == "y") {
                thisYMove();
            } else if (move_position.toLowerCase() == 'both') {
                thisAllMove();
            }
        });
    }
});

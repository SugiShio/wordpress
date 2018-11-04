!function(){
    'use strict';

    function Nav(el) {
        this.$el    = $(el);
        this.$btn   = this.$el.siblings('#nav_btn');
        this.isOpen = false;
        this.init();
    }

    Nav.prototype = {
        init: function () {
            var self = this;

            self.$el.removeClass('is-open');
            self.$btn.removeClass('is-open');

            self.$btn.on('click', function(e) {
                e.stopPropagation();
                if(self.isOpen) {
                    $(this).removeClass('is-open');
                    self.$el.removeClass('is-open');
                    self.isOpen = false;
                } else {
                    $(this).addClass('is-open');
                    self.$el.addClass('is-open');
                    self.isOpen = true;
                }
            })

            self.$el.on('click', function(e) {
                e.stopPropagation();
            })

            $('body').on('click', function(){
                if(self.isOpen) {
                    self.$btn.removeClass('is-open');
                    self.$el.removeClass('is-open');
                    self.isOpen = false;
                }
            })
        }
    }

    $(function() {
        var nav = new Nav('#nav');
    })
}()
define([
    'jquery',
    'ko',
    'uiComponent'
], function ($, ko, Component) {
    'use strict';

    return Component.extend({
        defaults: {
            template: 'ChupaPrecios_CheckoutFields/delivery-instructions-block'
        },
        initialize: function () {
            this._super();
            return this;
        }
    });
});

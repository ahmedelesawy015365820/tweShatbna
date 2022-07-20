"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_view_admin_loata_products_index_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=script&lang=js":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=script&lang=js ***!
  \**************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _composables_products__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../composables/products */ "./resources/js/view/admin/loata/composables/products.js");


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "index",
  setup: function setup() {
    var _productsComposable = (0,_composables_products__WEBPACK_IMPORTED_MODULE_1__.productsComposable)(),
        products = _productsComposable.products,
        search = _productsComposable.search,
        loading = _productsComposable.loading,
        intervals = _productsComposable.intervals,
        getProducts = _productsComposable.getProducts,
        deleteProduct = _productsComposable.deleteProduct,
        countdown = _productsComposable.countdown,
        getCategories = _productsComposable.getCategories,
        categories = _productsComposable.categories,
        date = _productsComposable.date,
        category = _productsComposable.category;

    (0,vue__WEBPACK_IMPORTED_MODULE_0__.onMounted)(function () {
      getCategories();
      getProducts();
    });
    (0,vue__WEBPACK_IMPORTED_MODULE_0__.onUnmounted)(function () {
      intervals.value.forEach(clearInterval);
    });
    return {
      loading: loading,
      getProducts: getProducts,
      search: search,
      deleteProduct: deleteProduct,
      products: products,
      countdown: countdown,
      date: date,
      categories: categories,
      category: category
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=template&id=1dbf36a7&scoped=true":
/*!******************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=template&id=1dbf36a7&scoped=true ***!
  \******************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _withScopeId = function _withScopeId(n) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.pushScopeId)("data-v-1dbf36a7"), n = n(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.popScopeId)(), n;
};

var _hoisted_1 = {
  "class": "content container-fluid"
};
var _hoisted_2 = {
  "class": "row"
};
var _hoisted_3 = {
  "class": "col-lg-12"
};
var _hoisted_4 = {
  "class": "row justify-content-between"
};
var _hoisted_5 = {
  "class": "col-md-3 col-sm-12"
};
var _hoisted_6 = ["placeholder"];
var _hoisted_7 = {
  "class": "col-md-3 col-sm-12"
};
var _hoisted_8 = {
  "class": "col-md-3 mb-3"
};
var _hoisted_9 = {
  value: ""
};
var _hoisted_10 = ["value"];
var _hoisted_11 = {
  "class": "col-3 row justify-content-end"
};
var _hoisted_12 = {
  "class": "row mt-3"
};
var _hoisted_13 = {
  "class": "card flex-fill"
};
var _hoisted_14 = ["src"];
var _hoisted_15 = {
  "class": "card-header"
};
var _hoisted_16 = {
  "class": "card-title mb-0 text-center"
};
var _hoisted_17 = {
  "class": "card-body"
};
var _hoisted_18 = ["id"];
var _hoisted_19 = {
  "class": "text-center"
};
var _hoisted_20 = {
  "class": "time text-center"
};
var _hoisted_21 = {
  "class": "second"
};
var _hoisted_22 = ["id"];
var _hoisted_23 = {
  "class": "m-1"
};

var _hoisted_24 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "point"
  }, ":", -1
  /* HOISTED */
  );
});

var _hoisted_25 = {
  "class": "minute"
};
var _hoisted_26 = ["id"];
var _hoisted_27 = {
  "class": "m-1"
};

var _hoisted_28 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "point"
  }, ":", -1
  /* HOISTED */
  );
});

var _hoisted_29 = {
  "class": "hour"
};
var _hoisted_30 = ["id"];
var _hoisted_31 = {
  "class": "m-1"
};

var _hoisted_32 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "point"
  }, ":", -1
  /* HOISTED */
  );
});

var _hoisted_33 = ["id"];
var _hoisted_34 = {
  "class": "m-1"
};
var _hoisted_35 = ["id"];
var _hoisted_36 = {
  "class": "row justify-content-around my-2"
};
var _hoisted_37 = {
  "class": "col-6 text-center"
};
var _hoisted_38 = {
  "class": "color-org"
};
var _hoisted_39 = {
  "class": "col-6 text-center"
};
var _hoisted_40 = {
  "class": "color-org"
};
var _hoisted_41 = {
  key: 0
};
var _hoisted_42 = {
  "class": "text-danger"
};

var _hoisted_43 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)();

var _hoisted_44 = {
  key: 1
};
var _hoisted_45 = {
  "class": "card-text text-center my-3"
};
var _hoisted_46 = {
  "class": "text-center"
};

var _hoisted_47 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
    "class": "far fa-edit mx-1"
  }, null, -1
  /* HOISTED */
  );
});

var _hoisted_48 = ["onClick"];

var _hoisted_49 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
    "class": "far fa-trash-alt mx-1"
  }, null, -1
  /* HOISTED */
  );
});

var _hoisted_50 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "< Previous", -1
  /* HOISTED */
  );
});

var _hoisted_51 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "Next >", -1
  /* HOISTED */
  );
});

function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _component_Breadcrumb = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Breadcrumb");

  var _component_loader = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("loader");

  var _component_router_link = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("router-link");

  var _component_Pagination = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("Pagination");

  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
    "class": (0,vue__WEBPACK_IMPORTED_MODULE_0__.normalizeClass)(['page-wrapper', this.$i18n.locale == 'ar' ? 'page-wrapper-ar' : ''])
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Breadcrumb, {
    title: _ctx.$t('global.Products'),
    routeName: "dashboard"
  }, null, 8
  /* PROPS */
  , ["title"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Table "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [$setup.loading ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(_component_loader, {
    key: 0
  })) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "search",
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.search = $event;
    }),
    "class": "form-control",
    placeholder: _ctx.$t('global.Search')
  }, null, 8
  /* PROPS */
  , _hoisted_6), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.search]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "date",
    onChange: _cache[1] || (_cache[1] = function () {
      return $setup.getProducts && $setup.getProducts.apply($setup, arguments);
    }),
    "onUpdate:modelValue": _cache[2] || (_cache[2] = function ($event) {
      return $setup.date = $event;
    }),
    "class": "form-control"
  }, null, 544
  /* HYDRATE_EVENTS, NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.date]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("select", {
    id: "validationCustom00",
    "class": "form-control",
    "onUpdate:modelValue": _cache[3] || (_cache[3] = function ($event) {
      return $setup.category = $event;
    }),
    onChange: _cache[4] || (_cache[4] = function () {
      return $setup.getProducts && $setup.getProducts.apply($setup, arguments);
    })
  }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("option", _hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('global.Select Category')), 1
  /* TEXT */
  ), ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.categories, function (category) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("option", {
      value: category.id,
      key: category.id
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(category.name), 9
    /* TEXT, PROPS */
    , _hoisted_10);
  }), 128
  /* KEYED_FRAGMENT */
  ))], 544
  /* HYDRATE_EVENTS, NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelSelect, $setup.category]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_link, {
    to: {
      name: 'createProduct',
      params: {
        lang: _ctx.locale || 'ar'
      }
    },
    "class": "btn btn-custom btn-warning w-75",
    style: {
      "height": "42px"
    }
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("Add")), 1
      /* TEXT */
      )];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["to"])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_12, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.products.data, function (product, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
      "class": "col-12 col-md-6 col-lg-4 d-flex",
      key: product.id
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_13, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
      alt: "Card Image",
      src: product.image,
      "class": "card-img-top",
      style: {
        "width": "100%",
        "height": "221px"
      }
    }, null, 8
    /* PROPS */
    , _hoisted_14), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h5", _hoisted_16, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.name), 1
    /* TEXT */
    )]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [$setup.countdown(product.expiry_date, product.id) ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
      key: 0,
      "class": "time-container d-block",
      id: 'time' + product.id
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h4", _hoisted_19, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Expire at")), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_20, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
      id: 'second' + product.id
    }, "00", 8
    /* PROPS */
    , _hoisted_22), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", _hoisted_23, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Second")), 1
    /* TEXT */
    )]), _hoisted_24, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
      id: 'minute' + product.id
    }, "00", 8
    /* PROPS */
    , _hoisted_26), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", _hoisted_27, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Minute")), 1
    /* TEXT */
    )]), _hoisted_28, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
      id: 'hour' + product.id
    }, "00", 8
    /* PROPS */
    , _hoisted_30), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", _hoisted_31, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Hour")), 1
    /* TEXT */
    )]), _hoisted_32, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
      id: 'day' + product.id
    }, "00", 8
    /* PROPS */
    , _hoisted_33), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("small", _hoisted_34, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Day")), 1
    /* TEXT */
    )])])], 8
    /* PROPS */
    , _hoisted_18)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
      "class": "text-danger text-center d-none",
      id: 'expired' + product.id
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Expired")), 9
    /* TEXT, PROPS */
    , _hoisted_35), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_37, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_38, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Stock")), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.stock), 1
    /* TEXT */
    )]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_39, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_40, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Price")), 1
    /* TEXT */
    ), product.sale > 0 ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_41, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("del", _hoisted_42, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.price), 1
    /* TEXT */
    ), _hoisted_43, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.sale), 1
    /* TEXT */
    )])) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("span", _hoisted_44, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.price), 1
    /* TEXT */
    )), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)(" " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('global.LE')), 1
    /* TEXT */
    )])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", _hoisted_45, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(product.description), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_46, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_link, {
      to: {
        name: 'updateProduct',
        params: {
          lang: _ctx.locale || 'ar',
          id: product.id
        }
      },
      "class": "btn btn-primary mx-2",
      href: "#"
    }, {
      "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
        return [_hoisted_47, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Edit")), 1
        /* TEXT */
        )];
      }),
      _: 2
      /* DYNAMIC */

    }, 1032
    /* PROPS, DYNAMIC_SLOTS */
    , ["to"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" <a class=\"btn btn-info\" href=\"#\"><i class=\"far fa-eye\"></i>{{$t('global.View')}}</a> "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
      "class": "btn btn-danger mx-2",
      href: "#",
      onClick: (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
        return $setup.deleteProduct(product.id, index);
      }, ["prevent"])
    }, [_hoisted_49, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t("global.Delete")), 1
    /* TEXT */
    )], 8
    /* PROPS */
    , _hoisted_48)])])])]);
  }), 128
  /* KEYED_FRAGMENT */
  ))])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" /Table "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" start Pagination "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Pagination, {
    data: $setup.products,
    onPaginationChangePage: $setup.getProducts
  }, {
    "prev-nav": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_50];
    }),
    "next-nav": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_51];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["data", "onPaginationChangePage"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" end Pagination ")]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" /Page Wrapper ")], 2
  /* CLASS */
  );
}

/***/ }),

/***/ "./resources/js/view/admin/loata/composables/products.js":
/*!***************************************************************!*\
  !*** ./resources/js/view/admin/loata/composables/products.js ***!
  \***************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "productsComposable": () => (/* binding */ productsComposable)
/* harmony export */ });
/* harmony import */ var _api_adminAxios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../api/adminAxios */ "./resources/js/api/adminAxios.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var vue_i18n__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-i18n */ "./node_modules/vue-i18n/dist/vue-i18n.esm-bundler.js");
/* harmony import */ var _kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @kyvg/vue3-notification */ "./node_modules/@kyvg/vue3-notification/dist/index.esm.js");
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.mjs");
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }

function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return exports; }; var exports = {}, Op = Object.prototype, hasOwn = Op.hasOwnProperty, $Symbol = "function" == typeof Symbol ? Symbol : {}, iteratorSymbol = $Symbol.iterator || "@@iterator", asyncIteratorSymbol = $Symbol.asyncIterator || "@@asyncIterator", toStringTagSymbol = $Symbol.toStringTag || "@@toStringTag"; function define(obj, key, value) { return Object.defineProperty(obj, key, { value: value, enumerable: !0, configurable: !0, writable: !0 }), obj[key]; } try { define({}, ""); } catch (err) { define = function define(obj, key, value) { return obj[key] = value; }; } function wrap(innerFn, outerFn, self, tryLocsList) { var protoGenerator = outerFn && outerFn.prototype instanceof Generator ? outerFn : Generator, generator = Object.create(protoGenerator.prototype), context = new Context(tryLocsList || []); return generator._invoke = function (innerFn, self, context) { var state = "suspendedStart"; return function (method, arg) { if ("executing" === state) throw new Error("Generator is already running"); if ("completed" === state) { if ("throw" === method) throw arg; return doneResult(); } for (context.method = method, context.arg = arg;;) { var delegate = context.delegate; if (delegate) { var delegateResult = maybeInvokeDelegate(delegate, context); if (delegateResult) { if (delegateResult === ContinueSentinel) continue; return delegateResult; } } if ("next" === context.method) context.sent = context._sent = context.arg;else if ("throw" === context.method) { if ("suspendedStart" === state) throw state = "completed", context.arg; context.dispatchException(context.arg); } else "return" === context.method && context.abrupt("return", context.arg); state = "executing"; var record = tryCatch(innerFn, self, context); if ("normal" === record.type) { if (state = context.done ? "completed" : "suspendedYield", record.arg === ContinueSentinel) continue; return { value: record.arg, done: context.done }; } "throw" === record.type && (state = "completed", context.method = "throw", context.arg = record.arg); } }; }(innerFn, self, context), generator; } function tryCatch(fn, obj, arg) { try { return { type: "normal", arg: fn.call(obj, arg) }; } catch (err) { return { type: "throw", arg: err }; } } exports.wrap = wrap; var ContinueSentinel = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var IteratorPrototype = {}; define(IteratorPrototype, iteratorSymbol, function () { return this; }); var getProto = Object.getPrototypeOf, NativeIteratorPrototype = getProto && getProto(getProto(values([]))); NativeIteratorPrototype && NativeIteratorPrototype !== Op && hasOwn.call(NativeIteratorPrototype, iteratorSymbol) && (IteratorPrototype = NativeIteratorPrototype); var Gp = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(IteratorPrototype); function defineIteratorMethods(prototype) { ["next", "throw", "return"].forEach(function (method) { define(prototype, method, function (arg) { return this._invoke(method, arg); }); }); } function AsyncIterator(generator, PromiseImpl) { function invoke(method, arg, resolve, reject) { var record = tryCatch(generator[method], generator, arg); if ("throw" !== record.type) { var result = record.arg, value = result.value; return value && "object" == _typeof(value) && hasOwn.call(value, "__await") ? PromiseImpl.resolve(value.__await).then(function (value) { invoke("next", value, resolve, reject); }, function (err) { invoke("throw", err, resolve, reject); }) : PromiseImpl.resolve(value).then(function (unwrapped) { result.value = unwrapped, resolve(result); }, function (error) { return invoke("throw", error, resolve, reject); }); } reject(record.arg); } var previousPromise; this._invoke = function (method, arg) { function callInvokeWithMethodAndArg() { return new PromiseImpl(function (resolve, reject) { invoke(method, arg, resolve, reject); }); } return previousPromise = previousPromise ? previousPromise.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); }; } function maybeInvokeDelegate(delegate, context) { var method = delegate.iterator[context.method]; if (undefined === method) { if (context.delegate = null, "throw" === context.method) { if (delegate.iterator["return"] && (context.method = "return", context.arg = undefined, maybeInvokeDelegate(delegate, context), "throw" === context.method)) return ContinueSentinel; context.method = "throw", context.arg = new TypeError("The iterator does not provide a 'throw' method"); } return ContinueSentinel; } var record = tryCatch(method, delegate.iterator, context.arg); if ("throw" === record.type) return context.method = "throw", context.arg = record.arg, context.delegate = null, ContinueSentinel; var info = record.arg; return info ? info.done ? (context[delegate.resultName] = info.value, context.next = delegate.nextLoc, "return" !== context.method && (context.method = "next", context.arg = undefined), context.delegate = null, ContinueSentinel) : info : (context.method = "throw", context.arg = new TypeError("iterator result is not an object"), context.delegate = null, ContinueSentinel); } function pushTryEntry(locs) { var entry = { tryLoc: locs[0] }; 1 in locs && (entry.catchLoc = locs[1]), 2 in locs && (entry.finallyLoc = locs[2], entry.afterLoc = locs[3]), this.tryEntries.push(entry); } function resetTryEntry(entry) { var record = entry.completion || {}; record.type = "normal", delete record.arg, entry.completion = record; } function Context(tryLocsList) { this.tryEntries = [{ tryLoc: "root" }], tryLocsList.forEach(pushTryEntry, this), this.reset(!0); } function values(iterable) { if (iterable) { var iteratorMethod = iterable[iteratorSymbol]; if (iteratorMethod) return iteratorMethod.call(iterable); if ("function" == typeof iterable.next) return iterable; if (!isNaN(iterable.length)) { var i = -1, next = function next() { for (; ++i < iterable.length;) { if (hasOwn.call(iterable, i)) return next.value = iterable[i], next.done = !1, next; } return next.value = undefined, next.done = !0, next; }; return next.next = next; } } return { next: doneResult }; } function doneResult() { return { value: undefined, done: !0 }; } return GeneratorFunction.prototype = GeneratorFunctionPrototype, define(Gp, "constructor", GeneratorFunctionPrototype), define(GeneratorFunctionPrototype, "constructor", GeneratorFunction), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, toStringTagSymbol, "GeneratorFunction"), exports.isGeneratorFunction = function (genFun) { var ctor = "function" == typeof genFun && genFun.constructor; return !!ctor && (ctor === GeneratorFunction || "GeneratorFunction" === (ctor.displayName || ctor.name)); }, exports.mark = function (genFun) { return Object.setPrototypeOf ? Object.setPrototypeOf(genFun, GeneratorFunctionPrototype) : (genFun.__proto__ = GeneratorFunctionPrototype, define(genFun, toStringTagSymbol, "GeneratorFunction")), genFun.prototype = Object.create(Gp), genFun; }, exports.awrap = function (arg) { return { __await: arg }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, asyncIteratorSymbol, function () { return this; }), exports.AsyncIterator = AsyncIterator, exports.async = function (innerFn, outerFn, self, tryLocsList, PromiseImpl) { void 0 === PromiseImpl && (PromiseImpl = Promise); var iter = new AsyncIterator(wrap(innerFn, outerFn, self, tryLocsList), PromiseImpl); return exports.isGeneratorFunction(outerFn) ? iter : iter.next().then(function (result) { return result.done ? result.value : iter.next(); }); }, defineIteratorMethods(Gp), define(Gp, toStringTagSymbol, "Generator"), define(Gp, iteratorSymbol, function () { return this; }), define(Gp, "toString", function () { return "[object Generator]"; }), exports.keys = function (object) { var keys = []; for (var key in object) { keys.push(key); } return keys.reverse(), function next() { for (; keys.length;) { var key = keys.pop(); if (key in object) return next.value = key, next.done = !1, next; } return next.done = !0, next; }; }, exports.values = values, Context.prototype = { constructor: Context, reset: function reset(skipTempReset) { if (this.prev = 0, this.next = 0, this.sent = this._sent = undefined, this.done = !1, this.delegate = null, this.method = "next", this.arg = undefined, this.tryEntries.forEach(resetTryEntry), !skipTempReset) for (var name in this) { "t" === name.charAt(0) && hasOwn.call(this, name) && !isNaN(+name.slice(1)) && (this[name] = undefined); } }, stop: function stop() { this.done = !0; var rootRecord = this.tryEntries[0].completion; if ("throw" === rootRecord.type) throw rootRecord.arg; return this.rval; }, dispatchException: function dispatchException(exception) { if (this.done) throw exception; var context = this; function handle(loc, caught) { return record.type = "throw", record.arg = exception, context.next = loc, caught && (context.method = "next", context.arg = undefined), !!caught; } for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i], record = entry.completion; if ("root" === entry.tryLoc) return handle("end"); if (entry.tryLoc <= this.prev) { var hasCatch = hasOwn.call(entry, "catchLoc"), hasFinally = hasOwn.call(entry, "finallyLoc"); if (hasCatch && hasFinally) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } else if (hasCatch) { if (this.prev < entry.catchLoc) return handle(entry.catchLoc, !0); } else { if (!hasFinally) throw new Error("try statement without catch or finally"); if (this.prev < entry.finallyLoc) return handle(entry.finallyLoc); } } } }, abrupt: function abrupt(type, arg) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc <= this.prev && hasOwn.call(entry, "finallyLoc") && this.prev < entry.finallyLoc) { var finallyEntry = entry; break; } } finallyEntry && ("break" === type || "continue" === type) && finallyEntry.tryLoc <= arg && arg <= finallyEntry.finallyLoc && (finallyEntry = null); var record = finallyEntry ? finallyEntry.completion : {}; return record.type = type, record.arg = arg, finallyEntry ? (this.method = "next", this.next = finallyEntry.finallyLoc, ContinueSentinel) : this.complete(record); }, complete: function complete(record, afterLoc) { if ("throw" === record.type) throw record.arg; return "break" === record.type || "continue" === record.type ? this.next = record.arg : "return" === record.type ? (this.rval = this.arg = record.arg, this.method = "return", this.next = "end") : "normal" === record.type && afterLoc && (this.next = afterLoc), ContinueSentinel; }, finish: function finish(finallyLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.finallyLoc === finallyLoc) return this.complete(entry.completion, entry.afterLoc), resetTryEntry(entry), ContinueSentinel; } }, "catch": function _catch(tryLoc) { for (var i = this.tryEntries.length - 1; i >= 0; --i) { var entry = this.tryEntries[i]; if (entry.tryLoc === tryLoc) { var record = entry.completion; if ("throw" === record.type) { var thrown = record.arg; resetTryEntry(entry); } return thrown; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(iterable, resultName, nextLoc) { return this.delegate = { iterator: values(iterable), resultName: resultName, nextLoc: nextLoc }, "next" === this.method && (this.arg = undefined), ContinueSentinel; } }, exports; }

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }






function productsComposable() {
  var formData = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)({});
  var categories = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)({});
  var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
  var loading = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)(false); //loading for button

  var errors = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)({}); //errors for create or update

  var message = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)(""); // message for notify

  var products = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)({}); //data for index page

  var intervals = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)([]); //data for index page

  var debounce = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)({}); // for search

  var search = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)(""); //search in index page

  var date = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)(""); //search in index page

  var category = (0,vue__WEBPACK_IMPORTED_MODULE_1__.ref)(""); //search in index page

  var _useI18n = (0,vue_i18n__WEBPACK_IMPORTED_MODULE_4__.useI18n)(),
      t = _useI18n.t;

  (0,vue__WEBPACK_IMPORTED_MODULE_1__.watch)(search, function (search, prevSearch) {
    clearTimeout(debounce.value);
    debounce.value = setTimeout(function () {
      getProducts();
    }, 400);
  }); //get products

  var getProducts = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
      var page,
          _args = arguments;
      return _regeneratorRuntime().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              page = _args.length > 0 && _args[0] !== undefined ? _args[0] : 1;
              loading.value = true;
              _api_adminAxios__WEBPACK_IMPORTED_MODULE_0__["default"].get("/v1/dashboard/products?page=".concat(page, "&search=").concat(search.value, "&date=").concat(date.value, "&category=").concat(category.value)).then(function (res) {
                intervals.value.forEach(clearInterval);
                products.value = res.data.data.products;
              })["catch"](function (err) {
                console.log(err.response.data);
              })["finally"](function () {
                loading.value = false;
              });

            case 3:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }));

    return function getProducts() {
      return _ref.apply(this, arguments);
    };
  }(); //delete products


  var deleteProduct = /*#__PURE__*/function () {
    var _ref2 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee2(id, index) {
      return _regeneratorRuntime().wrap(function _callee2$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              Swal.fire({
                title: t("treasury.AreYouSureDelete"),
                text: t("treasury.YouWontBeAbleToRevertThis"),
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
              }).then(function (result) {
                if (result.isConfirmed) {
                  _api_adminAxios__WEBPACK_IMPORTED_MODULE_0__["default"]["delete"]("/v1/dashboard/products/".concat(id)).then(function (res) {
                    products.value.data.splice(index, index + 1);
                    Swal.fire({
                      icon: "success",
                      title: t("global.Your package has been deleted."),
                      showConfirmButton: false,
                      timer: 1500
                    });
                  })["catch"](function (err) {
                    console.log(err.response); // if(err.response.data.errors){
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'يوجد خطا في النظام...',
                    //         text: 'لا ينفع حذف هذه الدوله بسبب وجود اشخاص مشتركين فيها !',
                    //     });
                    // }else {
                    //     Swal.fire({
                    //         icon: 'error',
                    //         title: 'يوجد خطا في النظام...',
                    //         text: 'يوجد خطا في النظام !',
                    //     });
                    // }
                  });
                }
              });

            case 1:
            case "end":
              return _context2.stop();
          }
        }
      }, _callee2);
    }));

    return function deleteProduct(_x, _x2) {
      return _ref2.apply(this, arguments);
    };
  }(); //store product  request


  var createProduct = /*#__PURE__*/function () {
    var _ref3 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee3(e) {
      var form;
      return _regeneratorRuntime().wrap(function _callee3$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              loading.value = true;
              errors.value = {};
              form = new FormData(e.target);
              _context3.next = 5;
              return _api_adminAxios__WEBPACK_IMPORTED_MODULE_0__["default"].post("/v1/dashboard/products", form).then(function (result) {
                (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_2__.notify)({
                  title: t("global.Successfully added") + "<i class=\"fas fa-check-circle\"></i>",
                  type: "success",
                  duration: 5000,
                  speed: 2000
                });
                e.target.reset();
              })["catch"](function (e) {
                if (e.response.data.errors) {
                  for (var el in e.response.data.errors) {
                    errors.value[el] = e.response.data.errors[el][0];
                  }
                } else {
                  (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_2__.notify)({
                    title: t("global.Unknown error") + " <i class=\"fas fa-check-circle\"></i>",
                    type: "error",
                    duration: 5000,
                    speed: 2000
                  });
                }
              });

            case 5:
              loading.value = false;

            case 6:
            case "end":
              return _context3.stop();
          }
        }
      }, _callee3);
    }));

    return function createProduct(_x3) {
      return _ref3.apply(this, arguments);
    };
  }(); //update product  request


  var updateProduct = /*#__PURE__*/function () {
    var _ref4 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee4(e, id) {
      var form;
      return _regeneratorRuntime().wrap(function _callee4$(_context4) {
        while (1) {
          switch (_context4.prev = _context4.next) {
            case 0:
              loading.value = true;
              errors.value = {};
              form = new FormData(e.target);
              form.append("id", id);
              _context4.next = 6;
              return _api_adminAxios__WEBPACK_IMPORTED_MODULE_0__["default"].post("/v1/dashboard/products/" + id, form).then(function (result) {
                (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_2__.notify)({
                  title: t("global.Successfully updated") + "<i class=\"fas fa-check-circle\"></i>",
                  type: "success",
                  duration: 5000,
                  speed: 2000
                });
                formData.value = {};
                router.push({
                  name: "Products"
                });
              })["catch"](function (e) {
                if (e.response.data.errors) {
                  for (var el in e.response.data.errors) {
                    errors.value[el] = e.response.data.errors[el][0];
                  }
                } else {
                  (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_2__.notify)({
                    title: t("global.Unknown error") + " <i class=\"fas fa-check-circle\"></i>",
                    type: "error",
                    duration: 5000,
                    speed: 2000
                  });
                }
              });

            case 6:
              loading.value = false;

            case 7:
            case "end":
              return _context4.stop();
          }
        }
      }, _callee4);
    }));

    return function updateProduct(_x4, _x5) {
      return _ref4.apply(this, arguments);
    };
  }(); //get products by id


  var getProduct = /*#__PURE__*/function () {
    var _ref5 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee5(id) {
      return _regeneratorRuntime().wrap(function _callee5$(_context5) {
        while (1) {
          switch (_context5.prev = _context5.next) {
            case 0:
              _api_adminAxios__WEBPACK_IMPORTED_MODULE_0__["default"].get("/v1/dashboard/products/".concat(id)).then(function (res) {
                formData.value = {
                  ar: {
                    name: res.data.data.product.translations[0].name,
                    description: res.data.data.product.translations[0].description,
                    divo: res.data.data.product.translations[0].divo
                  },
                  en: {
                    name: res.data.data.product.translations[1].name,
                    description: res.data.data.product.translations[1].description,
                    divo: res.data.data.product.translations[1].divo
                  },
                  stock: res.data.data.product.stock,
                  weight: res.data.data.product.weight,
                  price: res.data.data.product.price,
                  sale: res.data.data.product.sale,
                  expiry_date: res.data.data.product.expiry_date,
                  category_id: res.data.data.product.category_id,
                  id: res.data.data.product.id
                };
              })["catch"](function (err) {
                console.log(err);
              })["finally"](function () {
                loading.value = false;
              });

            case 1:
            case "end":
              return _context5.stop();
          }
        }
      }, _callee5);
    }));

    return function getProduct(_x6) {
      return _ref5.apply(this, arguments);
    };
  }();

  var getCategories = /*#__PURE__*/function () {
    var _ref6 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee6() {
      return _regeneratorRuntime().wrap(function _callee6$(_context6) {
        while (1) {
          switch (_context6.prev = _context6.next) {
            case 0:
              _context6.next = 2;
              return _api_adminAxios__WEBPACK_IMPORTED_MODULE_0__["default"].get("/v1/web/getAllCategories").then(function (res) {
                console.log(res);
                categories.value = res.data.data.categories;
              });

            case 2:
            case "end":
              return _context6.stop();
          }
        }
      }, _callee6);
    }));

    return function getCategories() {
      return _ref6.apply(this, arguments);
    };
  }();

  var countdown = /*#__PURE__*/function () {
    var _ref7 = _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee7(time, id) {
      var countDownDate, x;
      return _regeneratorRuntime().wrap(function _callee7$(_context7) {
        while (1) {
          switch (_context7.prev = _context7.next) {
            case 0:
              // Set the date we're counting down to
              countDownDate = new Date(time).getTime(); // Update the count down every 1 second

              x = setInterval(function () {
                // Get today's date and time
                var now = new Date().getTime(); // Find the distance between now and the count down date

                var distance = countDownDate - now; // Time calculations for days, hours, minutes and seconds

                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor(distance % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
                var minutes = Math.floor(distance % (1000 * 60 * 60) / (1000 * 60));
                var seconds = Math.floor(distance % (1000 * 60) / 1000); // Output the result in an element with id="demo"

                document.getElementById("second" + id) ? document.getElementById("second" + id).innerHTML = seconds : null;
                document.getElementById("day" + id) ? document.getElementById("day" + id).innerHTML = days : null;
                document.getElementById("minute" + id) ? document.getElementById("minute" + id).innerHTML = minutes : null;
                document.getElementById("hour" + id) ? document.getElementById("hour" + id).innerHTML = hours : null; // If the count down is over, write some text

                if (distance < 0) {
                  clearInterval(x);
                  $('#time' + id).removeClass('d-block');
                  $('#time' + id).addClass('d-none');
                  $('#expired' + id).removeClass('d-none');
                  $('#expired' + id).addClass('d-block');
                }
              }, 1000);
              intervals.value.push(x);

            case 3:
            case "end":
              return _context7.stop();
          }
        }
      }, _callee7);
    }));

    return function countdown(_x7, _x8) {
      return _ref7.apply(this, arguments);
    };
  }();

  return {
    formData: formData,
    loading: loading,
    date: date,
    category: category,
    intervals: intervals,
    errors: errors,
    message: message,
    search: search,
    products: products,
    getProducts: getProducts,
    countdown: countdown,
    deleteProduct: deleteProduct,
    createProduct: createProduct,
    updateProduct: updateProduct,
    getProduct: getProduct,
    getCategories: getCategories,
    categories: categories
  };
} //set errors dynamic in object
// function setErrors(errors, errors_array) {
//     if (errors_array) {
//         for (const el in errors_array) {
//             errors.value[el] = errors_array[el][0];
//         }
//     } else {
//         notify(
//             i18n.t("Unknown error,please try again later."),
//             "topright",
//             "error"
//         );
//     }
// }

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n.card[data-v-1dbf36a7] {\r\n  position: relative;\n}\n.btn-custom[data-v-1dbf36a7] {\r\n  width: 30%;\n}\n.custom[data-v-1dbf36a7] {\r\n  border: 1px solid #d7d7d7;\r\n  padding: 2px;\r\n  border-radius: 5px;\r\n  width: 35%;\n}\n.btn[data-v-1dbf36a7] {\r\n  color: #fff;\n}\n.time-container[data-v-1dbf36a7] {\r\n  position: initial;\r\n  position: relative;\n}\n.time-container h4[data-v-1dbf36a7] {\r\n  color: #fcb00c;\n}\n.time-container h4[data-v-1dbf36a7] {\r\n  font-weight: bold;\r\n  font-size: 18px;\r\n  text-transform: lowercase;\r\n  color: #fcb00c;\r\n  text-align: start;\r\n  padding: 0 20px;\n}\n.time-container .time-container[data-v-1dbf36a7] {\r\n  position: relative;\n}\n.time-container .time[data-v-1dbf36a7] {\r\n  position: relative;\n}\n.time-container .time .point[data-v-1dbf36a7] {\r\n  top: 6px;\r\n  position: relative;\r\n  font-size: 19px;\r\n  color: #000;\r\n  font-weight: 600;\n}\n.time-container .time div[data-v-1dbf36a7] {\r\n  display: inline-block;\r\n  background: #000;\r\n  position: relative;\r\n  color: #fff;\r\n  border-radius: 5px;\r\n  margin: 2px 4px;\r\n  text-align: center;\r\n  padding: 0px 12px 9px;\n}\n.time-container .time div small[data-v-1dbf36a7] {\r\n  display: block;\r\n\r\n  font-size: 8px;\n}\n.time-container .time div.minute small[data-v-1dbf36a7] {\r\n  left: 7px;\n}\n.time-container .time div.hour small.en[data-v-1dbf36a7] {\r\n  left: 10px;\n}\n.time-container .time div.minute small.en[data-v-1dbf36a7],\r\n.time-container .time div small.en[data-v-1dbf36a7] {\r\n  left: 5px;\n}\n.time-container .time div.hour small[data-v-1dbf36a7] {\r\n  left: 7px;\n}\n.color-org[data-v-1dbf36a7] {\r\n  display:block;\r\n  color: #fcb00c;\n}\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css":
/*!*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_1dbf36a7_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_1dbf36a7_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_1dbf36a7_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/view/admin/loata/products/index.vue":
/*!**********************************************************!*\
  !*** ./resources/js/view/admin/loata/products/index.vue ***!
  \**********************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _index_vue_vue_type_template_id_1dbf36a7_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=1dbf36a7&scoped=true */ "./resources/js/view/admin/loata/products/index.vue?vue&type=template&id=1dbf36a7&scoped=true");
/* harmony import */ var _index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js */ "./resources/js/view/admin/loata/products/index.vue?vue&type=script&lang=js");
/* harmony import */ var _index_vue_vue_type_style_index_0_id_1dbf36a7_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css */ "./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css");
/* harmony import */ var D_xampp_htdocs_shatbna_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;


const __exports__ = /*#__PURE__*/(0,D_xampp_htdocs_shatbna_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__["default"])(_index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_index_vue_vue_type_template_id_1dbf36a7_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render],['__scopeId',"data-v-1dbf36a7"],['__file',"resources/js/view/admin/loata/products/index.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/view/admin/loata/products/index.vue?vue&type=script&lang=js":
/*!**********************************************************************************!*\
  !*** ./resources/js/view/admin/loata/products/index.vue?vue&type=script&lang=js ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/view/admin/loata/products/index.vue?vue&type=template&id=1dbf36a7&scoped=true":
/*!****************************************************************************************************!*\
  !*** ./resources/js/view/admin/loata/products/index.vue?vue&type=template&id=1dbf36a7&scoped=true ***!
  \****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_template_id_1dbf36a7_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_template_id_1dbf36a7_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=template&id=1dbf36a7&scoped=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=template&id=1dbf36a7&scoped=true");


/***/ }),

/***/ "./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css":
/*!******************************************************************************************************************!*\
  !*** ./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css ***!
  \******************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_1dbf36a7_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/style-loader/dist/cjs.js!../../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/loata/products/index.vue?vue&type=style&index=0&id=1dbf36a7&scoped=true&lang=css");


/***/ })

}]);
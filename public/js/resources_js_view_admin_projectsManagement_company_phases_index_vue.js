"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_view_admin_projectsManagement_company_phases_index_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=script&lang=js":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=script&lang=js ***!
  \*********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var _composables_company_phases__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../composables/company_phases */ "./resources/js/view/admin/projectsManagement/composables/company_phases.js");


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "index",
  setup: function setup() {
    var _companyPhasesComposa = (0,_composables_company_phases__WEBPACK_IMPORTED_MODULE_1__.companyPhasesComposable)(),
        companyPhases = _companyPhasesComposa.companyPhases,
        search = _companyPhasesComposa.search,
        loading = _companyPhasesComposa.loading,
        getCompanyPhases = _companyPhasesComposa.getCompanyPhases,
        deleteCompanyPhases = _companyPhasesComposa.deleteCompanyPhases;

    (0,vue__WEBPACK_IMPORTED_MODULE_0__.onMounted)(function () {
      getCompanyPhases();
    });
    return {
      loading: loading,
      getCompanyPhases: getCompanyPhases,
      search: search,
      deleteCompanyPhases: deleteCompanyPhases,
      companyPhases: companyPhases
    };
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=template&id=5a515923&scoped=true":
/*!*************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=template&id=5a515923&scoped=true ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");


var _withScopeId = function _withScopeId(n) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.pushScopeId)("data-v-5a515923"), n = n(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.popScopeId)(), n;
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
  "class": "card"
};
var _hoisted_5 = {
  "class": "card-body"
};
var _hoisted_6 = {
  "class": "card-header pt-0"
};
var _hoisted_7 = {
  "class": "row justify-content-between"
};
var _hoisted_8 = {
  "class": "col-5"
};
var _hoisted_9 = {
  "class": "col-5 row justify-content-end"
};
var _hoisted_10 = {
  "class": "table-responsive"
};
var _hoisted_11 = {
  "class": "table mb-0"
};

var _hoisted_12 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, "#", -1
  /* HOISTED */
  );
});

var _hoisted_13 = ["href"];
var _hoisted_14 = ["src"];

var _hoisted_15 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
    "class": "far fa-edit"
  }, null, -1
  /* HOISTED */
  );
});

var _hoisted_16 = ["onClick"];

var _hoisted_17 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
    "class": "far fa-trash-alt"
  }, null, -1
  /* HOISTED */
  );
});

var _hoisted_18 = [_hoisted_17];
var _hoisted_19 = {
  key: 1
};
var _hoisted_20 = {
  "class": "text-center",
  colspan: "6"
};

var _hoisted_21 = /*#__PURE__*/_withScopeId(function () {
  return /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "< Previous", -1
  /* HOISTED */
  );
});

var _hoisted_22 = /*#__PURE__*/_withScopeId(function () {
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
    title: _ctx.$t('global.Company Phases'),
    routeName: "dashboard"
  }, null, 8
  /* PROPS */
  , ["title"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" Table "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_4, [$setup.loading ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createBlock)(_component_loader, {
    key: 0
  })) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_6, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_7, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('Search:')) + " ", 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.withDirectives)((0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "search",
    "onUpdate:modelValue": _cache[0] || (_cache[0] = function ($event) {
      return $setup.search = $event;
    }),
    "class": "custom w-75"
  }, null, 512
  /* NEED_PATCH */
  ), [[vue__WEBPACK_IMPORTED_MODULE_0__.vModelText, $setup.search]])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_9, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_link, {
    to: {
      name: 'createCompanyPhases',
      params: {
        lang: _ctx.locale || 'ar'
      }
    },
    "class": "btn btn-custom btn-warning"
  }, {
    "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('Add')), 1
      /* TEXT */
      )];
    }),
    _: 1
    /* STABLE */

  }, 8
  /* PROPS */
  , ["to"])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_10, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("table", _hoisted_11, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("thead", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tr", null, [_hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('global.Image')), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('global.Phase Name')), 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('global.Client Percentage')) + " (%)", 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('global.Company Percentage')) + " (%)", 1
  /* TEXT */
  ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('global.Action')), 1
  /* TEXT */
  )])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("tbody", null, [$setup.companyPhases.data ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    key: 0
  }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)($setup.companyPhases.data, function (item, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("tr", {
      key: item.id
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(index + 1), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
      href: '/web/img/general/' + item.image,
      target: "_blank"
    }, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
      src: '/web/img/general/' + item.image,
      alt: "",
      style: {
        "width": "100px",
        "height": "70px"
      }
    }, null, 8
    /* PROPS */
    , _hoisted_14)], 8
    /* PROPS */
    , _hoisted_13)]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(item.name), 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(item.client_percentage) + "%", 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(item.company_percentage) + "%", 1
    /* TEXT */
    ), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("td", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_router_link, {
      to: {
        name: 'updateCompanyPhases',
        params: {
          lang: _ctx.locale || 'ar',
          id: item.id
        }
      },
      "class": "btn btn-sm btn-success me-2"
    }, {
      "default": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
        return [_hoisted_15];
      }),
      _: 2
      /* DYNAMIC */

    }, 1032
    /* PROPS, DYNAMIC_SLOTS */
    , ["to"]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
      href: "#",
      onClick: (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function ($event) {
        return $setup.deleteCompanyPhases(item.id, index);
      }, ["prevent"]),
      "data-bs-target": "#staticBackdrop",
      "class": "btn btn-sm btn-danger me-2"
    }, _hoisted_18, 8
    /* PROPS */
    , _hoisted_16)])]);
  }), 128
  /* KEYED_FRAGMENT */
  )) : ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("tr", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("th", _hoisted_20, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.$t('No Data Found')), 1
  /* TEXT */
  )]))])])])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" /Table "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" start Pagination "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_Pagination, {
    data: $setup.companyPhases,
    onPaginationChangePage: $setup.getCompanyPhases
  }, {
    "prev-nav": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_21];
    }),
    "next-nav": (0,vue__WEBPACK_IMPORTED_MODULE_0__.withCtx)(function () {
      return [_hoisted_22];
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

/***/ "./resources/js/view/admin/projectsManagement/composables/company_phases.js":
/*!**********************************************************************************!*\
  !*** ./resources/js/view/admin/projectsManagement/composables/company_phases.js ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "companyPhasesComposable": () => (/* binding */ companyPhasesComposable)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _api_adminAxios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../../api/adminAxios */ "./resources/js/api/adminAxios.js");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var vue_i18n__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-i18n */ "./node_modules/vue-i18n/dist/vue-i18n.esm-bundler.js");
/* harmony import */ var _kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @kyvg/vue3-notification */ "./node_modules/@kyvg/vue3-notification/dist/index.esm.js");
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.esm-bundler.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }






function companyPhasesComposable() {
  var formData = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)({});
  var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_4__.useRouter)();
  var loading = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(false); //loading for button

  var errors = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)({}); //errors for create or update

  var message = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(''); // message for notify

  var companyPhases = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)({}); //data for index page

  var debounce = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)({}); // for search

  var search = (0,vue__WEBPACK_IMPORTED_MODULE_2__.ref)(''); //search in index page

  var _useI18n = (0,vue_i18n__WEBPACK_IMPORTED_MODULE_5__.useI18n)(),
      t = _useI18n.t;

  (0,vue__WEBPACK_IMPORTED_MODULE_2__.watch)(search, function (search, prevSearch) {
    clearTimeout(debounce.value);
    debounce.value = setTimeout(function () {
      getCompanyPhases();
    }, 500);
  }); //get all company criteria

  var getCompanyPhases = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
      var page,
          _args = arguments;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              page = _args.length > 0 && _args[0] !== undefined ? _args[0] : 1;
              loading.value = true;
              _api_adminAxios__WEBPACK_IMPORTED_MODULE_1__["default"].get("/v1/dashboard/companyPhases?page=".concat(page, "&search=").concat(search.value)).then(function (res) {
                companyPhases.value = res.data.data.phases;
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

    return function getCompanyPhases() {
      return _ref.apply(this, arguments);
    };
  }(); //delete company criteria


  var deleteCompanyPhases = /*#__PURE__*/function () {
    var _ref2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee2(id, index) {
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee2$(_context2) {
        while (1) {
          switch (_context2.prev = _context2.next) {
            case 0:
              Swal.fire({
                title: t("treasury.AreYouSureDelete"),
                text: t("treasury.YouWontBeAbleToRevertThis"),
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
              }).then(function (result) {
                if (result.isConfirmed) {
                  _api_adminAxios__WEBPACK_IMPORTED_MODULE_1__["default"]["delete"]("/v1/dashboard/companyPhases/".concat(id)).then(function (res) {
                    companyPhases.value.data.splice(index, index + 1);
                    Swal.fire({
                      icon: 'success',
                      title: t('global.Your package has been deleted.'),
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

    return function deleteCompanyPhases(_x, _x2) {
      return _ref2.apply(this, arguments);
    };
  }(); //store criteria  request


  var createCompanyPhase = /*#__PURE__*/function () {
    var _ref3 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee3(e) {
      var form;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee3$(_context3) {
        while (1) {
          switch (_context3.prev = _context3.next) {
            case 0:
              loading.value = true;
              errors.value = {};
              form = new FormData(e.target);
              _context3.next = 5;
              return _api_adminAxios__WEBPACK_IMPORTED_MODULE_1__["default"].post('/v1/dashboard/companyPhases', form).then(function (result) {
                (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_3__.notify)({
                  title: t('global.Successfully added') + "<i class=\"fas fa-check-circle\"></i>",
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
                  (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_3__.notify)({
                    title: t('global.Unknown error') + " <i class=\"fas fa-check-circle\"></i>",
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

    return function createCompanyPhase(_x3) {
      return _ref3.apply(this, arguments);
    };
  }(); //update criteria  request


  var updateCompanyPhase = /*#__PURE__*/function () {
    var _ref4 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee4(e, id) {
      var form;
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee4$(_context4) {
        while (1) {
          switch (_context4.prev = _context4.next) {
            case 0:
              loading.value = true;
              errors.value = {};
              form = new FormData(e.target);
              form.append('id', id);
              _context4.next = 6;
              return _api_adminAxios__WEBPACK_IMPORTED_MODULE_1__["default"].post('/v1/dashboard/companyPhases/' + id, form).then(function (result) {
                console.log(result);
                (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_3__.notify)({
                  title: t('global.Successfully updated') + "<i class=\"fas fa-check-circle\"></i>",
                  type: "success",
                  duration: 5000,
                  speed: 2000
                });
                formData.value = {};
                router.push({
                  name: 'indexCompanyPhases'
                });
              })["catch"](function (e) {
                if (e.response.data.errors) {
                  for (var el in e.response.data.errors) {
                    errors.value[el] = e.response.data.errors[el][0];
                  }
                } else {
                  (0,_kyvg_vue3_notification__WEBPACK_IMPORTED_MODULE_3__.notify)({
                    title: t('global.Unknown error') + " <i class=\"fas fa-check-circle\"></i>",
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

    return function updateCompanyPhase(_x4, _x5) {
      return _ref4.apply(this, arguments);
    };
  }(); //get criteria by id


  var getPhase = /*#__PURE__*/function () {
    var _ref5 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee5(id) {
      return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee5$(_context5) {
        while (1) {
          switch (_context5.prev = _context5.next) {
            case 0:
              _api_adminAxios__WEBPACK_IMPORTED_MODULE_1__["default"].get("/v1/dashboard/companyPhases/".concat(id)).then(function (res) {
                formData.value = {
                  ar: {
                    name: res.data.data.phase.translations[0].name
                  },
                  en: {
                    name: res.data.data.phase.translations[1].name
                  },
                  client_percentage: res.data.data.phase.client_percentage,
                  company_percentage: res.data.data.phase.company_percentage,
                  id: res.data.data.phase.id
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

    return function getPhase(_x6) {
      return _ref5.apply(this, arguments);
    };
  }();

  return {
    formData: formData,
    loading: loading,
    errors: errors,
    message: message,
    search: search,
    companyPhases: companyPhases,
    getCompanyPhases: getCompanyPhases,
    deleteCompanyPhases: deleteCompanyPhases,
    createCompanyPhase: createCompanyPhase,
    updateCompanyPhase: updateCompanyPhase,
    getPhase: getPhase
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

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css":
/*!**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n.card[data-v-5a515923] {\r\n    position: relative;\n}\n.btn-custom[data-v-5a515923] {\r\n    width: 30%;\n}\n.custom[data-v-5a515923] {\r\n    border: 1px solid #D7D7D7;\r\n    padding: 2px;\r\n    border-radius: 5px;\r\n    width: 35%;\n}\n.btn[data-v-5a515923] {\r\n    color: #fff;\n}\r\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! !../../../../../../node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js */ "./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js");
/* harmony import */ var _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_5a515923_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !!../../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css");

            

var options = {};

options.insert = "head";
options.singleton = false;

var update = _node_modules_style_loader_dist_runtime_injectStylesIntoStyleTag_js__WEBPACK_IMPORTED_MODULE_0___default()(_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_5a515923_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"], options);



/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_5a515923_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_1__["default"].locals || {});

/***/ }),

/***/ "./resources/js/view/admin/projectsManagement/company_phases/index.vue":
/*!*****************************************************************************!*\
  !*** ./resources/js/view/admin/projectsManagement/company_phases/index.vue ***!
  \*****************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _index_vue_vue_type_template_id_5a515923_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.vue?vue&type=template&id=5a515923&scoped=true */ "./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=template&id=5a515923&scoped=true");
/* harmony import */ var _index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./index.vue?vue&type=script&lang=js */ "./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=script&lang=js");
/* harmony import */ var _index_vue_vue_type_style_index_0_id_5a515923_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css */ "./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css");
/* harmony import */ var D_xampp_htdocs_shatbna_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;


const __exports__ = /*#__PURE__*/(0,D_xampp_htdocs_shatbna_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_3__["default"])(_index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_index_vue_vue_type_template_id_5a515923_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render],['__scopeId',"data-v-5a515923"],['__file',"resources/js/view/admin/projectsManagement/company_phases/index.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=script&lang=js":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=script&lang=js ***!
  \*****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=template&id=5a515923&scoped=true":
/*!***********************************************************************************************************************!*\
  !*** ./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=template&id=5a515923&scoped=true ***!
  \***********************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_template_id_5a515923_scoped_true__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_template_id_5a515923_scoped_true__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=template&id=5a515923&scoped=true */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=template&id=5a515923&scoped=true");


/***/ }),

/***/ "./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css":
/*!*************************************************************************************************************************************!*\
  !*** ./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css ***!
  \*************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_dist_cjs_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_use_1_node_modules_vue_loader_dist_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_use_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_index_vue_vue_type_style_index_0_id_5a515923_scoped_true_lang_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/style-loader/dist/cjs.js!../../../../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!../../../../../../node_modules/vue-loader/dist/stylePostLoader.js!../../../../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!../../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css */ "./node_modules/style-loader/dist/cjs.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/view/admin/projectsManagement/company_phases/index.vue?vue&type=style&index=0&id=5a515923&scoped=true&lang=css");


/***/ })

}]);
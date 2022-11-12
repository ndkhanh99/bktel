/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************!*\
  !*** ./resources/js/dashboard3.js ***!
  \************************************/
/* global Chart:false */

$(function () {
  'use strict';

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  };
  var mode = 'index';
  var intersect = true;
  var $salesChart = $('#sales-chart');
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart($salesChart, {
    type: 'bar',
    data: {
      labels: ['JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
      datasets: [{
        backgroundColor: '#007bff',
        borderColor: '#007bff',
        data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
      }, {
        backgroundColor: '#ced4da',
        borderColor: '#ced4da',
        data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
      }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            // Include a dollar sign in the ticks
            callback: function callback(value) {
              if (value >= 1000) {
                value /= 1000;
                value += 'k';
              }
              return '$' + value;
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  });
  var $visitorsChart = $('#visitors-chart');
  // eslint-disable-next-line no-unused-vars
  var visitorsChart = new Chart($visitorsChart, {
    data: {
      labels: ['18th', '20th', '22nd', '24th', '26th', '28th', '30th'],
      datasets: [{
        type: 'line',
        data: [100, 120, 170, 167, 180, 177, 160],
        backgroundColor: 'transparent',
        borderColor: '#007bff',
        pointBorderColor: '#007bff',
        pointBackgroundColor: '#007bff',
        fill: false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      }, {
        type: 'line',
        data: [60, 80, 70, 67, 80, 77, 100],
        backgroundColor: 'tansparent',
        borderColor: '#ced4da',
        pointBorderColor: '#ced4da',
        pointBackgroundColor: '#ced4da',
        fill: false
        // pointHoverBackgroundColor: '#ced4da',
        // pointHoverBorderColor    : '#ced4da'
      }]
    },

    options: {
      maintainAspectRatio: false,
      tooltips: {
        mode: mode,
        intersect: intersect
      },
      hover: {
        mode: mode,
        intersect: intersect
      },
      legend: {
        display: false
      },
      scales: {
        yAxes: [{
          // display: false,
          gridLines: {
            display: true,
            lineWidth: '4px',
            color: 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks: $.extend({
            beginAtZero: true,
            suggestedMax: 200
          }, ticksStyle)
        }],
        xAxes: [{
          display: true,
          gridLines: {
            display: false
          },
          ticks: ticksStyle
        }]
      }
    }
  });
});

// lgtm [js/unused-local-variable]
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!******************************!*\
  !*** ./resources/js/demo.js ***!
  \******************************/
function _typeof(obj) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (obj) { return typeof obj; } : function (obj) { return obj && "function" == typeof Symbol && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }, _typeof(obj); }
/**
 * AdminLTE Demo Menu
 * ------------------
 * You should not use this file in production.
 * This file is for demo purposes only.
 */

/* eslint-disable camelcase */

(function ($) {
  'use strict';

  setTimeout(function () {
    if (window.___browserSync___ === undefined && Number(localStorage.getItem('AdminLTE:Demo:MessageShowed')) < Date.now()) {
      localStorage.setItem('AdminLTE:Demo:MessageShowed', Date.now() + 15 * 60 * 1000);
      // eslint-disable-next-line no-alert
      alert('You load AdminLTE\'s "demo.js", \nthis file is only created for testing purposes!');
    }
  }, 1000);
  function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
  }
  function createSkinBlock(colors, callback, noneSelected) {
    var $block = $('<select />', {
      "class": noneSelected ? 'custom-select mb-3 border-0' : 'custom-select mb-3 text-light border-0 ' + colors[0].replace(/accent-|navbar-/, 'bg-')
    });
    if (noneSelected) {
      var $default = $('<option />', {
        text: 'None Selected'
      });
      $block.append($default);
    }
    colors.forEach(function (color) {
      var $color = $('<option />', {
        "class": (_typeof(color) === 'object' ? color.join(' ') : color).replace('navbar-', 'bg-').replace('accent-', 'bg-'),
        text: capitalizeFirstLetter((_typeof(color) === 'object' ? color.join(' ') : color).replace(/navbar-|accent-|bg-/, '').replace('-', ' '))
      });
      $block.append($color);
    });
    if (callback) {
      $block.on('change', callback);
    }
    return $block;
  }
  var $sidebar = $('.control-sidebar');
  var $container = $('<div />', {
    "class": 'p-3 control-sidebar-content'
  });
  $sidebar.append($container);

  // Checkboxes

  $container.append('<h5>Customize AdminLTE</h5><hr class="mb-2"/>');
  var $dark_mode_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('dark-mode'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('dark-mode');
    } else {
      $('body').removeClass('dark-mode');
    }
  });
  var $dark_mode_container = $('<div />', {
    "class": 'mb-4'
  }).append($dark_mode_checkbox).append('<span>Dark Mode</span>');
  $container.append($dark_mode_container);
  $container.append('<h6>Header Options</h6>');
  var $header_fixed_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('layout-navbar-fixed'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('layout-navbar-fixed');
    } else {
      $('body').removeClass('layout-navbar-fixed');
    }
  });
  var $header_fixed_container = $('<div />', {
    "class": 'mb-1'
  }).append($header_fixed_checkbox).append('<span>Fixed</span>');
  $container.append($header_fixed_container);
  var $dropdown_legacy_offset_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.main-header').hasClass('dropdown-legacy'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('dropdown-legacy');
    } else {
      $('.main-header').removeClass('dropdown-legacy');
    }
  });
  var $dropdown_legacy_offset_container = $('<div />', {
    "class": 'mb-1'
  }).append($dropdown_legacy_offset_checkbox).append('<span>Dropdown Legacy Offset</span>');
  $container.append($dropdown_legacy_offset_container);
  var $no_border_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.main-header').hasClass('border-bottom-0'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('border-bottom-0');
    } else {
      $('.main-header').removeClass('border-bottom-0');
    }
  });
  var $no_border_container = $('<div />', {
    "class": 'mb-4'
  }).append($no_border_checkbox).append('<span>No border</span>');
  $container.append($no_border_container);
  $container.append('<h6>Sidebar Options</h6>');
  var $sidebar_collapsed_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('sidebar-collapse'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('sidebar-collapse');
      $(window).trigger('resize');
    } else {
      $('body').removeClass('sidebar-collapse');
      $(window).trigger('resize');
    }
  });
  var $sidebar_collapsed_container = $('<div />', {
    "class": 'mb-1'
  }).append($sidebar_collapsed_checkbox).append('<span>Collapsed</span>');
  $container.append($sidebar_collapsed_container);
  $(document).on('collapsed.lte.pushmenu', '[data-widget="pushmenu"]', function () {
    $sidebar_collapsed_checkbox.prop('checked', true);
  });
  $(document).on('shown.lte.pushmenu', '[data-widget="pushmenu"]', function () {
    $sidebar_collapsed_checkbox.prop('checked', false);
  });
  var $sidebar_fixed_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('layout-fixed'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('layout-fixed');
      $(window).trigger('resize');
    } else {
      $('body').removeClass('layout-fixed');
      $(window).trigger('resize');
    }
  });
  var $sidebar_fixed_container = $('<div />', {
    "class": 'mb-1'
  }).append($sidebar_fixed_checkbox).append('<span>Fixed</span>');
  $container.append($sidebar_fixed_container);
  var $sidebar_mini_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('sidebar-mini'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('sidebar-mini');
    } else {
      $('body').removeClass('sidebar-mini');
    }
  });
  var $sidebar_mini_container = $('<div />', {
    "class": 'mb-1'
  }).append($sidebar_mini_checkbox).append('<span>Sidebar Mini</span>');
  $container.append($sidebar_mini_container);
  var $sidebar_mini_md_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('sidebar-mini-md'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('sidebar-mini-md');
    } else {
      $('body').removeClass('sidebar-mini-md');
    }
  });
  var $sidebar_mini_md_container = $('<div />', {
    "class": 'mb-1'
  }).append($sidebar_mini_md_checkbox).append('<span>Sidebar Mini MD</span>');
  $container.append($sidebar_mini_md_container);
  var $sidebar_mini_xs_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('sidebar-mini-xs'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('sidebar-mini-xs');
    } else {
      $('body').removeClass('sidebar-mini-xs');
    }
  });
  var $sidebar_mini_xs_container = $('<div />', {
    "class": 'mb-1'
  }).append($sidebar_mini_xs_checkbox).append('<span>Sidebar Mini XS</span>');
  $container.append($sidebar_mini_xs_container);
  var $flat_sidebar_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.nav-sidebar').hasClass('nav-flat'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-flat');
    } else {
      $('.nav-sidebar').removeClass('nav-flat');
    }
  });
  var $flat_sidebar_container = $('<div />', {
    "class": 'mb-1'
  }).append($flat_sidebar_checkbox).append('<span>Nav Flat Style</span>');
  $container.append($flat_sidebar_container);
  var $legacy_sidebar_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.nav-sidebar').hasClass('nav-legacy'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-legacy');
    } else {
      $('.nav-sidebar').removeClass('nav-legacy');
    }
  });
  var $legacy_sidebar_container = $('<div />', {
    "class": 'mb-1'
  }).append($legacy_sidebar_checkbox).append('<span>Nav Legacy Style</span>');
  $container.append($legacy_sidebar_container);
  var $compact_sidebar_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.nav-sidebar').hasClass('nav-compact'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-compact');
    } else {
      $('.nav-sidebar').removeClass('nav-compact');
    }
  });
  var $compact_sidebar_container = $('<div />', {
    "class": 'mb-1'
  }).append($compact_sidebar_checkbox).append('<span>Nav Compact</span>');
  $container.append($compact_sidebar_container);
  var $child_indent_sidebar_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.nav-sidebar').hasClass('nav-child-indent'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-child-indent');
    } else {
      $('.nav-sidebar').removeClass('nav-child-indent');
    }
  });
  var $child_indent_sidebar_container = $('<div />', {
    "class": 'mb-1'
  }).append($child_indent_sidebar_checkbox).append('<span>Nav Child Indent</span>');
  $container.append($child_indent_sidebar_container);
  var $child_hide_sidebar_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.nav-sidebar').hasClass('nav-collapse-hide-child'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('nav-collapse-hide-child');
    } else {
      $('.nav-sidebar').removeClass('nav-collapse-hide-child');
    }
  });
  var $child_hide_sidebar_container = $('<div />', {
    "class": 'mb-1'
  }).append($child_hide_sidebar_checkbox).append('<span>Nav Child Hide on Collapse</span>');
  $container.append($child_hide_sidebar_container);
  var $no_expand_sidebar_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.main-sidebar').hasClass('sidebar-no-expand'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-sidebar').addClass('sidebar-no-expand');
    } else {
      $('.main-sidebar').removeClass('sidebar-no-expand');
    }
  });
  var $no_expand_sidebar_container = $('<div />', {
    "class": 'mb-4'
  }).append($no_expand_sidebar_checkbox).append('<span>Disable Hover/Focus Auto-Expand</span>');
  $container.append($no_expand_sidebar_container);
  $container.append('<h6>Footer Options</h6>');
  var $footer_fixed_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('layout-footer-fixed'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('layout-footer-fixed');
    } else {
      $('body').removeClass('layout-footer-fixed');
    }
  });
  var $footer_fixed_container = $('<div />', {
    "class": 'mb-4'
  }).append($footer_fixed_checkbox).append('<span>Fixed</span>');
  $container.append($footer_fixed_container);
  $container.append('<h6>Small Text Options</h6>');
  var $text_sm_body_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('body').hasClass('text-sm'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('body').addClass('text-sm');
    } else {
      $('body').removeClass('text-sm');
    }
  });
  var $text_sm_body_container = $('<div />', {
    "class": 'mb-1'
  }).append($text_sm_body_checkbox).append('<span>Body</span>');
  $container.append($text_sm_body_container);
  var $text_sm_header_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.main-header').hasClass('text-sm'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-header').addClass('text-sm');
    } else {
      $('.main-header').removeClass('text-sm');
    }
  });
  var $text_sm_header_container = $('<div />', {
    "class": 'mb-1'
  }).append($text_sm_header_checkbox).append('<span>Navbar</span>');
  $container.append($text_sm_header_container);
  var $text_sm_brand_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.brand-link').hasClass('text-sm'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.brand-link').addClass('text-sm');
    } else {
      $('.brand-link').removeClass('text-sm');
    }
  });
  var $text_sm_brand_container = $('<div />', {
    "class": 'mb-1'
  }).append($text_sm_brand_checkbox).append('<span>Brand</span>');
  $container.append($text_sm_brand_container);
  var $text_sm_sidebar_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.nav-sidebar').hasClass('text-sm'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.nav-sidebar').addClass('text-sm');
    } else {
      $('.nav-sidebar').removeClass('text-sm');
    }
  });
  var $text_sm_sidebar_container = $('<div />', {
    "class": 'mb-1'
  }).append($text_sm_sidebar_checkbox).append('<span>Sidebar Nav</span>');
  $container.append($text_sm_sidebar_container);
  var $text_sm_footer_checkbox = $('<input />', {
    type: 'checkbox',
    value: 1,
    checked: $('.main-footer').hasClass('text-sm'),
    "class": 'mr-1'
  }).on('click', function () {
    if ($(this).is(':checked')) {
      $('.main-footer').addClass('text-sm');
    } else {
      $('.main-footer').removeClass('text-sm');
    }
  });
  var $text_sm_footer_container = $('<div />', {
    "class": 'mb-4'
  }).append($text_sm_footer_checkbox).append('<span>Footer</span>');
  $container.append($text_sm_footer_container);

  // Color Arrays

  var navbar_dark_skins = ['navbar-primary', 'navbar-secondary', 'navbar-info', 'navbar-success', 'navbar-danger', 'navbar-indigo', 'navbar-purple', 'navbar-pink', 'navbar-navy', 'navbar-lightblue', 'navbar-teal', 'navbar-cyan', 'navbar-dark', 'navbar-gray-dark', 'navbar-gray'];
  var navbar_light_skins = ['navbar-light', 'navbar-warning', 'navbar-white', 'navbar-orange'];
  var sidebar_colors = ['bg-primary', 'bg-warning', 'bg-info', 'bg-danger', 'bg-success', 'bg-indigo', 'bg-lightblue', 'bg-navy', 'bg-purple', 'bg-fuchsia', 'bg-pink', 'bg-maroon', 'bg-orange', 'bg-lime', 'bg-teal', 'bg-olive'];
  var accent_colors = ['accent-primary', 'accent-warning', 'accent-info', 'accent-danger', 'accent-success', 'accent-indigo', 'accent-lightblue', 'accent-navy', 'accent-purple', 'accent-fuchsia', 'accent-pink', 'accent-maroon', 'accent-orange', 'accent-lime', 'accent-teal', 'accent-olive'];
  var sidebar_skins = ['sidebar-dark-primary', 'sidebar-dark-warning', 'sidebar-dark-info', 'sidebar-dark-danger', 'sidebar-dark-success', 'sidebar-dark-indigo', 'sidebar-dark-lightblue', 'sidebar-dark-navy', 'sidebar-dark-purple', 'sidebar-dark-fuchsia', 'sidebar-dark-pink', 'sidebar-dark-maroon', 'sidebar-dark-orange', 'sidebar-dark-lime', 'sidebar-dark-teal', 'sidebar-dark-olive', 'sidebar-light-primary', 'sidebar-light-warning', 'sidebar-light-info', 'sidebar-light-danger', 'sidebar-light-success', 'sidebar-light-indigo', 'sidebar-light-lightblue', 'sidebar-light-navy', 'sidebar-light-purple', 'sidebar-light-fuchsia', 'sidebar-light-pink', 'sidebar-light-maroon', 'sidebar-light-orange', 'sidebar-light-lime', 'sidebar-light-teal', 'sidebar-light-olive'];

  // Navbar Variants

  $container.append('<h6>Navbar Variants</h6>');
  var $navbar_variants = $('<div />', {
    "class": 'd-flex'
  });
  var navbar_all_colors = navbar_dark_skins.concat(navbar_light_skins);
  var $navbar_variants_colors = createSkinBlock(navbar_all_colors, function () {
    var color = $(this).find('option:selected').attr('class').replace('bg-', 'navbar-');
    var $main_header = $('.main-header');
    $main_header.removeClass('navbar-dark').removeClass('navbar-light');
    navbar_all_colors.forEach(function (color) {
      $main_header.removeClass(color);
    });
    $(this).removeClass().addClass('custom-select mb-3 text-light border-0 ');
    if (navbar_dark_skins.indexOf(color) > -1) {
      $main_header.addClass('navbar-dark');
      $(this).addClass(color).addClass('text-light');
    } else {
      $main_header.addClass('navbar-light');
      $(this).addClass(color);
    }
    $main_header.addClass(color);
  });
  var active_navbar_color = null;
  var $main_header = $('.main-header');
  if ($main_header.length > 0) {
    $main_header[0].classList.forEach(function (className) {
      if (navbar_all_colors.indexOf(className) > -1 && active_navbar_color === null) {
        active_navbar_color = className.replace('navbar-', 'bg-');
      }
    });
  }
  $navbar_variants_colors.find('option.' + active_navbar_color).prop('selected', true);
  $navbar_variants_colors.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_navbar_color);
  $navbar_variants.append($navbar_variants_colors);
  $container.append($navbar_variants);

  // Sidebar Colors

  $container.append('<h6>Accent Color Variants</h6>');
  var $accent_variants = $('<div />', {
    "class": 'd-flex'
  });
  $container.append($accent_variants);
  $container.append(createSkinBlock(accent_colors, function () {
    var color = $(this).find('option:selected').attr('class');
    var $body = $('body');
    accent_colors.forEach(function (skin) {
      $body.removeClass(skin);
    });
    var accent_color_class = color.replace('bg-', 'accent-');
    $body.addClass(accent_color_class);
  }, true));
  var active_accent_color = null;
  $('body')[0].classList.forEach(function (className) {
    if (accent_colors.indexOf(className) > -1 && active_accent_color === null) {
      active_accent_color = className.replace('navbar-', 'bg-');
    }
  });

  // $accent_variants.find('option.' + active_accent_color).prop('selected', true)
  // $accent_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_accent_color)

  $container.append('<h6>Dark Sidebar Variants</h6>');
  var $sidebar_variants_dark = $('<div />', {
    "class": 'd-flex'
  });
  $container.append($sidebar_variants_dark);
  var $sidebar_dark_variants = createSkinBlock(sidebar_colors, function () {
    var color = $(this).find('option:selected').attr('class');
    var sidebar_class = 'sidebar-dark-' + color.replace('bg-', '');
    var $sidebar = $('.main-sidebar');
    sidebar_skins.forEach(function (skin) {
      $sidebar.removeClass(skin);
      $sidebar_light_variants.removeClass(skin.replace('sidebar-dark-', 'bg-')).removeClass('text-light');
    });
    $(this).removeClass().addClass('custom-select mb-3 text-light border-0').addClass(color);
    $sidebar_light_variants.find('option').prop('selected', false);
    $sidebar.addClass(sidebar_class);
    $('.sidebar').removeClass('os-theme-dark').addClass('os-theme-light');
  }, true);
  $container.append($sidebar_dark_variants);
  var active_sidebar_dark_color = null;
  var $main_sidebar = $('.main-sidebar');
  if ($main_sidebar.length > 0) {
    $main_sidebar[0].classList.forEach(function (className) {
      var color = className.replace('sidebar-dark-', 'bg-');
      if (sidebar_colors.indexOf(color) > -1 && active_sidebar_dark_color === null) {
        active_sidebar_dark_color = color;
      }
    });
  }
  $sidebar_dark_variants.find('option.' + active_sidebar_dark_color).prop('selected', true);
  $sidebar_dark_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_sidebar_dark_color);
  $container.append('<h6>Light Sidebar Variants</h6>');
  var $sidebar_variants_light = $('<div />', {
    "class": 'd-flex'
  });
  $container.append($sidebar_variants_light);
  var $sidebar_light_variants = createSkinBlock(sidebar_colors, function () {
    var color = $(this).find('option:selected').attr('class');
    var sidebar_class = 'sidebar-light-' + color.replace('bg-', '');
    var $sidebar = $('.main-sidebar');
    sidebar_skins.forEach(function (skin) {
      $sidebar.removeClass(skin);
      $sidebar_dark_variants.removeClass(skin.replace('sidebar-light-', 'bg-')).removeClass('text-light');
    });
    $(this).removeClass().addClass('custom-select mb-3 text-light border-0').addClass(color);
    $sidebar_dark_variants.find('option').prop('selected', false);
    $sidebar.addClass(sidebar_class);
    $('.sidebar').removeClass('os-theme-light').addClass('os-theme-dark');
  }, true);
  $container.append($sidebar_light_variants);
  var active_sidebar_light_color = null;
  if ($main_sidebar.length > 0) {
    $main_sidebar[0].classList.forEach(function (className) {
      var color = className.replace('sidebar-light-', 'bg-');
      if (sidebar_colors.indexOf(color) > -1 && active_sidebar_light_color === null) {
        active_sidebar_light_color = color;
      }
    });
  }
  if (active_sidebar_light_color !== null) {
    $sidebar_light_variants.find('option.' + active_sidebar_light_color).prop('selected', true);
    $sidebar_light_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_sidebar_light_color);
  }
  var logo_skins = navbar_all_colors;
  $container.append('<h6>Brand Logo Variants</h6>');
  var $logo_variants = $('<div />', {
    "class": 'd-flex'
  });
  $container.append($logo_variants);
  var $clear_btn = $('<a />', {
    href: '#'
  }).text('clear').on('click', function (e) {
    e.preventDefault();
    var $logo = $('.brand-link');
    logo_skins.forEach(function (skin) {
      $logo.removeClass(skin);
    });
  });
  var $brand_variants = createSkinBlock(logo_skins, function () {
    var color = $(this).find('option:selected').attr('class').replace('bg-', 'navbar-');
    var $logo = $('.brand-link');
    if (color === 'navbar-light' || color === 'navbar-white') {
      $logo.addClass('text-black');
    } else {
      $logo.removeClass('text-black');
    }
    logo_skins.forEach(function (skin) {
      $logo.removeClass(skin);
    });
    if (color) {
      $(this).removeClass().addClass('custom-select mb-3 border-0').addClass(color).addClass(color !== 'navbar-light' && color !== 'navbar-white' ? 'text-light' : '');
    } else {
      $(this).removeClass().addClass('custom-select mb-3 border-0');
    }
    $logo.addClass(color);
  }, true).append($clear_btn);
  $container.append($brand_variants);
  var active_brand_color = null;
  var $brand_link = $('.brand-link');
  if ($brand_link.length > 0) {
    $brand_link[0].classList.forEach(function (className) {
      if (logo_skins.indexOf(className) > -1 && active_brand_color === null) {
        active_brand_color = className.replace('navbar-', 'bg-');
      }
    });
  }
  if (active_brand_color) {
    $brand_variants.find('option.' + active_brand_color).prop('selected', true);
    $brand_variants.removeClass().addClass('custom-select mb-3 text-light border-0 ').addClass(active_brand_color);
  }
})(jQuery);
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!************************************!*\
  !*** ./resources/js/dashboard2.js ***!
  \************************************/
/* global Chart:false */

$(function () {
  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //-----------------------
  // - MONTHLY SALES CHART -
  //-----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  var salesChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      label: 'Digital Goods',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: [28, 48, 40, 19, 86, 27, 90]
    }, {
      label: 'Electronics',
      backgroundColor: 'rgba(210, 214, 222, 1)',
      borderColor: 'rgba(210, 214, 222, 1)',
      pointRadius: false,
      pointColor: 'rgba(210, 214, 222, 1)',
      pointStrokeColor: '#c1c7d1',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: [65, 59, 80, 81, 56, 55, 40]
    }]
  };
  var salesChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  };

  // This will get the first returned node in the jQuery collection.
  // eslint-disable-next-line no-unused-vars
  var salesChart = new Chart(salesChartCanvas, {
    type: 'line',
    data: salesChartData,
    options: salesChartOptions
  });

  //---------------------------
  // - END MONTHLY SALES CHART -
  //---------------------------

  //-------------
  // - PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieData = {
    labels: ['Chrome', 'IE', 'FireFox', 'Safari', 'Opera', 'Navigator'],
    datasets: [{
      data: [700, 500, 400, 600, 300, 100],
      backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
    }]
  };
  var pieOptions = {
    legend: {
      display: false
    }
  };
  // Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  // eslint-disable-next-line no-unused-vars
  var pieChart = new Chart(pieChartCanvas, {
    type: 'doughnut',
    data: pieData,
    options: pieOptions
  });

  //-----------------
  // - END PIE CHART -
  //-----------------

  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').mapael({
    map: {
      name: 'usa_states',
      zoom: {
        enabled: true,
        maxLevel: 10
      }
    }
  });

  // $('#world-map-markers').vectorMap({
  //   map              : 'world_en',
  //   normalizeFunction: 'polynomial',
  //   hoverOpacity     : 0.7,
  //   hoverColor       : false,
  //   backgroundColor  : 'transparent',
  //   regionStyle      : {
  //     initial      : {
  //       fill            : 'rgba(210, 214, 222, 1)',
  //       'fill-opacity'  : 1,
  //       stroke          : 'none',
  //       'stroke-width'  : 0,
  //       'stroke-opacity': 1
  //     },
  //     hover        : {
  //       'fill-opacity': 0.7,
  //       cursor        : 'pointer'
  //     },
  //     selected     : {
  //       fill: 'yellow'
  //     },
  //     selectedHover: {}
  //   },
  //   markerStyle      : {
  //     initial: {
  //       fill  : '#00a65a',
  //       stroke: '#111'
  //     }
  //   },
  //   markers          : [
  //     {
  //       latLng: [41.90, 12.45],
  //       name  : 'Vatican City'
  //     },
  //     {
  //       latLng: [43.73, 7.41],
  //       name  : 'Monaco'
  //     },
  //     {
  //       latLng: [-0.52, 166.93],
  //       name  : 'Nauru'
  //     },
  //     {
  //       latLng: [-8.51, 179.21],
  //       name  : 'Tuvalu'
  //     },
  //     {
  //       latLng: [43.93, 12.46],
  //       name  : 'San Marino'
  //     },
  //     {
  //       latLng: [47.14, 9.52],
  //       name  : 'Liechtenstein'
  //     },
  //     {
  //       latLng: [7.11, 171.06],
  //       name  : 'Marshall Islands'
  //     },
  //     {
  //       latLng: [17.3, -62.73],
  //       name  : 'Saint Kitts and Nevis'
  //     },
  //     {
  //       latLng: [3.2, 73.22],
  //       name  : 'Maldives'
  //     },
  //     {
  //       latLng: [35.88, 14.5],
  //       name  : 'Malta'
  //     },
  //     {
  //       latLng: [12.05, -61.75],
  //       name  : 'Grenada'
  //     },
  //     {
  //       latLng: [13.16, -61.23],
  //       name  : 'Saint Vincent and the Grenadines'
  //     },
  //     {
  //       latLng: [13.16, -59.55],
  //       name  : 'Barbados'
  //     },
  //     {
  //       latLng: [17.11, -61.85],
  //       name  : 'Antigua and Barbuda'
  //     },
  //     {
  //       latLng: [-4.61, 55.45],
  //       name  : 'Seychelles'
  //     },
  //     {
  //       latLng: [7.35, 134.46],
  //       name  : 'Palau'
  //     },
  //     {
  //       latLng: [42.5, 1.51],
  //       name  : 'Andorra'
  //     },
  //     {
  //       latLng: [14.01, -60.98],
  //       name  : 'Saint Lucia'
  //     },
  //     {
  //       latLng: [6.91, 158.18],
  //       name  : 'Federated States of Micronesia'
  //     },
  //     {
  //       latLng: [1.3, 103.8],
  //       name  : 'Singapore'
  //     },
  //     {
  //       latLng: [1.46, 173.03],
  //       name  : 'Kiribati'
  //     },
  //     {
  //       latLng: [-21.13, -175.2],
  //       name  : 'Tonga'
  //     },
  //     {
  //       latLng: [15.3, -61.38],
  //       name  : 'Dominica'
  //     },
  //     {
  //       latLng: [-20.2, 57.5],
  //       name  : 'Mauritius'
  //     },
  //     {
  //       latLng: [26.02, 50.55],
  //       name  : 'Bahrain'
  //     },
  //     {
  //       latLng: [0.33, 6.73],
  //       name  : 'São Tomé and Príncipe'
  //     }
  //   ]
  // })
});

// lgtm [js/unused-local-variable]
})();

// This entry need to be wrapped in an IIFE because it need to be isolated against other entry modules.
(() => {
/*!*******************************!*\
  !*** ./resources/js/chart.js ***!
  \*******************************/
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); enumerableOnly && (symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; })), keys.push.apply(keys, symbols); } return keys; }
function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = null != arguments[i] ? arguments[i] : {}; i % 2 ? ownKeys(Object(source), !0).forEach(function (key) { _defineProperty(target, key, source[key]); }) : Object.getOwnPropertyDescriptors ? Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)) : ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } return target; }
function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }
$(function () {
  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  //--------------
  //- AREA CHART -
  //--------------

  // Get context with jQuery - using jQuery's .get() method.
  var areaChartCanvas = $('#areaChart').get(0).getContext('2d');
  var areaChartData = {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      label: 'Digital Goods',
      backgroundColor: 'rgba(60,141,188,0.9)',
      borderColor: 'rgba(60,141,188,0.8)',
      pointRadius: false,
      pointColor: '#3b8bba',
      pointStrokeColor: 'rgba(60,141,188,1)',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data: [28, 48, 40, 19, 86, 27, 90]
    }, {
      label: 'Electronics',
      backgroundColor: 'rgba(210, 214, 222, 1)',
      borderColor: 'rgba(210, 214, 222, 1)',
      pointRadius: false,
      pointColor: 'rgba(210, 214, 222, 1)',
      pointStrokeColor: '#c1c7d1',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data: [65, 59, 80, 81, 56, 55, 40]
    }]
  };
  var areaChartOptions = {
    maintainAspectRatio: false,
    responsive: true,
    legend: {
      display: false
    },
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        }
      }],
      yAxes: [{
        gridLines: {
          display: false
        }
      }]
    }
  };

  // This will get the first returned node in the jQuery collection.
  new Chart(areaChartCanvas, {
    type: 'line',
    data: areaChartData,
    options: areaChartOptions
  });

  //-------------
  //- LINE CHART -
  //--------------
  var lineChartCanvas = $('#lineChart').get(0).getContext('2d');
  var lineChartOptions = $.extend(true, {}, areaChartOptions);
  var lineChartData = $.extend(true, {}, areaChartData);
  lineChartData.datasets[0].fill = false;
  lineChartData.datasets[1].fill = false;
  lineChartOptions.datasetFill = false;
  var lineChart = new Chart(lineChartCanvas, {
    type: 'line',
    data: lineChartData,
    options: lineChartOptions
  });

  //-------------
  //- DONUT CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var donutChartCanvas = $('#donutChart').get(0).getContext('2d');
  var donutData = {
    labels: ['Chrome', 'IE', 'FireFox', 'Safari', 'Opera', 'Navigator'],
    datasets: [{
      data: [700, 500, 400, 600, 300, 100],
      backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de']
    }]
  };
  var donutOptions = {
    maintainAspectRatio: false,
    responsive: true
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  new Chart(donutChartCanvas, {
    type: 'doughnut',
    data: donutData,
    options: donutOptions
  });

  //-------------
  //- PIE CHART -
  //-------------
  // Get context with jQuery - using jQuery's .get() method.
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
  var pieData = donutData;
  var pieOptions = {
    maintainAspectRatio: false,
    responsive: true
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions
  });

  //-------------
  //- BAR CHART -
  //-------------
  var barChartCanvas = $('#barChart').get(0).getContext('2d');
  var barChartData = $.extend(true, {}, areaChartData);
  var temp0 = areaChartData.datasets[0];
  var temp1 = areaChartData.datasets[1];
  barChartData.datasets[0] = temp1;
  barChartData.datasets[1] = temp0;
  var barChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    datasetFill: false
  };
  new Chart(barChartCanvas, {
    type: 'bar',
    data: barChartData,
    options: barChartOptions
  });

  //---------------------
  //- STACKED BAR CHART -
  //---------------------
  var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d');
  var stackedBarChartData = $.extend(true, {}, barChartData);
  var stackedBarChartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    scales: {
      xAxes: [{
        stacked: true
      }],
      yAxes: [{
        stacked: true
      }]
    }
  };
  new Chart(stackedBarChartCanvas, {
    type: 'bar',
    data: stackedBarChartData,
    options: stackedBarChartOptions
  });
});
$(function () {
  /* jQueryKnob */

  $('.knob').knob({
    /*change : function (value) {
     //console.log("change : " + value);
     },
     release : function (value) {
     console.log("release : " + value);
     },
     cancel : function () {
     console.log("cancel : " + this.value);
     },*/
    draw: function draw() {
      // "tron" case
      if (this.$.data('skin') == 'tron') {
        var a = this.angle(this.cv) // Angle
          ,
          sa = this.startAngle // Previous start angle
          ,
          sat = this.startAngle // Start angle
          ,
          ea // Previous end angle
          ,
          eat = sat + a // End angle
          ,
          r = true;
        this.g.lineWidth = this.lineWidth;
        this.o.cursor && (sat = eat - 0.3) && (eat = eat + 0.3);
        if (this.o.displayPrevious) {
          ea = this.startAngle + this.angle(this.value);
          this.o.cursor && (sa = ea - 0.3) && (ea = ea + 0.3);
          this.g.beginPath();
          this.g.strokeStyle = this.previousColor;
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
          this.g.stroke();
        }
        this.g.beginPath();
        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
        this.g.stroke();
        this.g.lineWidth = 2;
        this.g.beginPath();
        this.g.strokeStyle = this.o.fgColor;
        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
        this.g.stroke();
        return false;
      }
    }
  });
  /* END JQUERY KNOB */

  //INITIALIZE SPARKLINE CHARTS
  var sparkline1 = new Sparkline($('#sparkline-1')[0], {
    width: 240,
    height: 70,
    lineColor: '#92c1dc',
    endColor: '#92c1dc'
  });
  var sparkline2 = new Sparkline($('#sparkline-2')[0], {
    width: 240,
    height: 70,
    lineColor: '#f56954',
    endColor: '#f56954'
  });
  var sparkline3 = new Sparkline($('#sparkline-3')[0], {
    width: 240,
    height: 70,
    lineColor: '#3af221',
    endColor: '#3af221'
  });
  sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021]);
  sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921]);
  sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21]);
});
$(function () {
  /*
   * Flot Interactive Chart
   * -----------------------
   */
  // We use an inline data source in the example, usually data would
  // be fetched from a server
  var data = [],
    totalPoints = 100;
  function getRandomData() {
    if (data.length > 0) {
      data = data.slice(1);
    }

    // Do a random walk
    while (data.length < totalPoints) {
      var prev = data.length > 0 ? data[data.length - 1] : 50,
        y = prev + Math.random() * 10 - 5;
      if (y < 0) {
        y = 0;
      } else if (y > 100) {
        y = 100;
      }
      data.push(y);
    }

    // Zip the generated y values with the x values
    var res = [];
    for (var i = 0; i < data.length; ++i) {
      res.push([i, data[i]]);
    }
    return res;
  }
  var interactive_plot = $.plot('#interactive', [{
    data: getRandomData()
  }], {
    grid: {
      borderColor: '#f3f3f3',
      borderWidth: 1,
      tickColor: '#f3f3f3'
    },
    series: {
      color: '#3c8dbc',
      lines: {
        lineWidth: 2,
        show: true,
        fill: true
      }
    },
    yaxis: {
      min: 0,
      max: 100,
      show: true
    },
    xaxis: {
      show: true
    }
  });
  var updateInterval = 500; //Fetch data ever x milliseconds
  var realtime = 'on'; //If == to on then fetch data every x seconds. else stop fetching
  function update() {
    interactive_plot.setData([getRandomData()]);

    // Since the axes don't change, we don't need to call plot.setupGrid()
    interactive_plot.draw();
    if (realtime === 'on') {
      setTimeout(update, updateInterval);
    }
  }

  //INITIALIZE REALTIME DATA FETCHING
  if (realtime === 'on') {
    update();
  }
  //REALTIME TOGGLE
  $('#realtime .btn').click(function () {
    if ($(this).data('toggle') === 'on') {
      realtime = 'on';
    } else {
      realtime = 'off';
    }
    update();
  });
  /*
   * END INTERACTIVE CHART
   */

  /*
   * LINE CHART
   * ----------
   */
  //LINE randomly generated data

  var sin = [],
    cos = [];
  for (var i = 0; i < 14; i += 0.5) {
    sin.push([i, Math.sin(i)]);
    cos.push([i, Math.cos(i)]);
  }
  var line_data1 = {
    data: sin,
    color: '#3c8dbc'
  };
  var line_data2 = {
    data: cos,
    color: '#00c0ef'
  };
  $.plot('#line-chart', [line_data1, line_data2], {
    grid: {
      hoverable: true,
      borderColor: '#f3f3f3',
      borderWidth: 1,
      tickColor: '#f3f3f3'
    },
    series: {
      shadowSize: 0,
      lines: {
        show: true
      },
      points: {
        show: true
      }
    },
    lines: {
      fill: false,
      color: ['#3c8dbc', '#f56954']
    },
    yaxis: {
      show: true
    },
    xaxis: {
      show: true
    }
  });
  //Initialize tooltip on hover
  $('<div class="tooltip-inner" id="line-chart-tooltip"></div>').css({
    position: 'absolute',
    display: 'none',
    opacity: 0.8
  }).appendTo('body');
  $('#line-chart').bind('plothover', function (event, pos, item) {
    if (item) {
      var x = item.datapoint[0].toFixed(2),
        y = item.datapoint[1].toFixed(2);
      $('#line-chart-tooltip').html(item.series.label + ' of ' + x + ' = ' + y).css({
        top: item.pageY + 5,
        left: item.pageX + 5
      }).fadeIn(200);
    } else {
      $('#line-chart-tooltip').hide();
    }
  });
  /* END LINE CHART */

  /*
   * FULL WIDTH STATIC AREA CHART
   * -----------------
   */
  var areaData = [[2, 88.0], [3, 93.3], [4, 102.0], [5, 108.5], [6, 115.7], [7, 115.6], [8, 124.6], [9, 130.3], [10, 134.3], [11, 141.4], [12, 146.5], [13, 151.7], [14, 159.9], [15, 165.4], [16, 167.8], [17, 168.7], [18, 169.5], [19, 168.0]];
  $.plot('#area-chart', [areaData], {
    grid: {
      borderWidth: 0
    },
    series: {
      shadowSize: 0,
      // Drawing is faster without shadows
      color: '#00c0ef',
      lines: {
        fill: true //Converts the line chart to area chart
      }
    },

    yaxis: {
      show: false
    },
    xaxis: {
      show: false
    }
  });

  /* END AREA CHART */

  /*
   * BAR CHART
   * ---------
   */

  var bar_data = {
    data: [[1, 10], [2, 8], [3, 4], [4, 13], [5, 17], [6, 9]],
    bars: {
      show: true
    }
  };
  $.plot('#bar-chart', [bar_data], {
    grid: {
      borderWidth: 1,
      borderColor: '#f3f3f3',
      tickColor: '#f3f3f3'
    },
    series: {
      bars: {
        show: true,
        barWidth: 0.5,
        align: 'center'
      }
    },
    colors: ['#3c8dbc'],
    xaxis: {
      ticks: [[1, 'January'], [2, 'February'], [3, 'March'], [4, 'April'], [5, 'May'], [6, 'June']]
    }
  });
  /* END BAR CHART */

  /*
   * DONUT CHART
   * -----------
   */

  var donutData = [{
    label: 'Series2',
    data: 30,
    color: '#3c8dbc'
  }, {
    label: 'Series3',
    data: 20,
    color: '#0073b7'
  }, {
    label: 'Series4',
    data: 50,
    color: '#00c0ef'
  }];
  $.plot('#donut-chart', donutData, {
    series: {
      pie: {
        show: true,
        radius: 1,
        innerRadius: 0.5,
        label: {
          show: true,
          radius: 2 / 3,
          formatter: labelFormatter,
          threshold: 0.1
        }
      }
    },
    legend: {
      show: false
    }
  });
  /*
   * END DONUT CHART
   */
});

/*
 * Custom Label formatter
 * ----------------------
 */
function labelFormatter(label, series) {
  return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">' + label + '<br>' + Math.round(series.percent) + '%</div>';
}
$(function () {
  /* uPlot
   * -------
   * Here we will create a few charts using uPlot
   */

  function getSize(elementId) {
    return {
      width: document.getElementById(elementId).offsetWidth,
      height: document.getElementById(elementId).offsetHeight
    };
  }
  var data = [[0, 1, 2, 3, 4, 5, 6], [28, 48, 40, 19, 86, 27, 90], [65, 59, 80, 81, 56, 55, 40]];

  //--------------
  //- AREA CHART -
  //--------------

  var optsAreaChart = _objectSpread(_objectSpread({}, getSize('areaChart')), {}, {
    scales: {
      x: {
        time: false
      },
      y: {
        range: [0, 100]
      }
    },
    series: [{}, {
      fill: 'rgba(60,141,188,0.7)',
      stroke: 'rgba(60,141,188,1)'
    }, {
      stroke: '#c1c7d1',
      fill: 'rgba(210, 214, 222, .7)'
    }]
  });
  var areaChart = new uPlot(optsAreaChart, data, document.getElementById('areaChart'));
  var optsLineChart = _objectSpread(_objectSpread({}, getSize('lineChart')), {}, {
    scales: {
      x: {
        time: false
      },
      y: {
        range: [0, 100]
      }
    },
    series: [{}, {
      fill: 'transparent',
      width: 5,
      stroke: 'rgba(60,141,188,1)'
    }, {
      stroke: '#c1c7d1',
      width: 5,
      fill: 'transparent'
    }]
  });
  var lineChart = new uPlot(optsLineChart, data, document.getElementById('lineChart'));
  window.addEventListener("resize", function (e) {
    areaChart.setSize(getSize('areaChart'));
    lineChart.setSize(getSize('lineChart'));
  });
});
})();

/******/ })()
;
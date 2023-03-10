/*!
    * Start Bootstrap - SB Admin v7.0.4 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2021 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
    // 
// Scripts
// 
/*!
 * select2-customselectionadapter v1.0.0 - An implementation of a custom selection adapter for the Select2 plugin (multiple mode). Displays the selected tags into a separate section, leaving the search box empty.
 * Copyright (c) 2020 Andrei Victor Bulearca - https://github.com/andreivictor/select2-customSelectionAdapter#readme
 * License: MIT
 */


$.fn.select2.amd.define("select2/selection/customSelectionAdapter",["jquery","select2/selection/base","select2/selection/eventRelay","select2/utils"],function(n,e,t,c){function i(e,t){i.__super__.constructor.apply(this,arguments),this.options=t}return c.Extend(i,e),i.prototype.render=function(){var e=i.__super__.render.call(this);return e.addClass("select2-selection--multiple select2-selection--multiple--custom"),e.html('<ul class="select2-selection__rendered"></ul>'),this.$selectionTagsContainer=n('<div class="select2-container"></div>'),this.$selectionTagsContainer.addClass("select2-container--custom-selection select2-container--"+this.options.get("theme")),this.$selectionTags=e.clone().addClass("select2-selection--custom"),this.$selectionTagsContainer.html(this.$selectionTags),this.$selectionTagsContainer.addClass("select2-container--empty"),this.options.get("selectionContainer")?this.$selectionTagsContainer.appendTo(this.options.get("selectionContainer")):this.$selectionTagsContainer.insertAfter(this.$element.next(".select2")),e},i.prototype.bind=function(e,t){var s=this;i.__super__.bind.apply(this,arguments),this.$selection.on("click",function(e){s.trigger("toggle",{originalEvent:e})}),this.$selectionTags.on("click",".select2-selection__choice__remove",function(e){if(!s.options.get("disabled")){var t=n(this).parent().data("data");s.trigger("unselect",{originalEvent:e,data:t})}}),e.on("enable",function(){s.$selectionTagsContainer.removeClass("select2-container--disabled")}),e.on("disable",function(){s.$selectionTagsContainer.addClass("select2-container--disabled")})},i.prototype.clear=function(){this.$selectionTagsContainer.addClass("select2-container--empty"),this.$selection.find(".select2-selection__rendered").empty(),this.$selectionTags.find(".select2-selection__rendered").empty()},i.prototype.display=function(e,t){var s=this.options.get("templateSelection");return this.options.get("escapeMarkup")(s(e,t))},i.prototype.selectionContainer=function(){return n('<li class="select2-selection__choice"><span class="select2-selection__choice__remove" role="presentation">&times;</span></li>')},i.prototype.update=function(e){if(this.clear(),0!==e.length){this.$selectionTagsContainer.removeClass("select2-container--empty");for(var t=[],s=0;s<e.length;s++){var n=e[s],i=this.selectionContainer(),l=this.display(n,i);i.append(l),i.prop("title",n.title||n.text),i.data("data",n),t.push(i)}var o=this.$selectionTags.find(".select2-selection__rendered");c.appendMany(o,t),this.placeholder&&this.placeholder.text&&this.$search.attr("placeholder",this.placeholder.text)}},c.Decorate(i,t)}),function(){var e=$.fn.select2.amd.require("select2/defaults"),t=$.fn.select2.amd.require("select2/selection/placeholder"),s=$.fn.select2.amd.require("select2/selection/allowClear"),n=$.fn.select2.amd.require("select2/selection/search"),i=$.fn.select2.amd.require("select2/utils"),l=e.apply;e.apply=function(e){return e.selectionAdapter&&(null!=e.placeholder&&(e.selectionAdapter=i.Decorate(e.selectionAdapter,t)),e.selectionAdapter=i.Decorate(e.selectionAdapter,n),e.allowClear&&(e.selectionAdapter=i.Decorate(e.selectionAdapter,s))),l.apply(this,arguments)}}();
window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

jQuery(document).ready(function() {
			var CustomSelectionAdapter = $.fn.select2.amd.require("select2/selection/customSelectionAdapter");
			jQuery('.custom-multiple-types').select2({
				placeholder: 'Please Select...',
				tags: true,
				selectionAdapter: CustomSelectionAdapter
			});
});


var app = {

	base: '/Recipies/',

	inlineSearch: {
		_init: function(jq) {
			$('input[type="text"]').filter(function(){
				return this.name.match(/data\[RecipeIngredient\]\[(.*)\]\[ingredient\]/);
			}).bind('keyup', {that: this}, this.keyUp);
		},
		resultClick:{
			Ingredient: function(e) {
console.log(e);
console.log(this);
			}
		},
		firstPage: function(ev) {
console.log(ev.data);
		},
		prevPage: function(ev) {
console.log(ev.data);
		},
		nextPage: function(ev) {
console.log(ev.data);
		},
		last7Page: function(ev) {
console.log(ev.data);
		},
		updateList: function(data,element) {
			var that = this;
			var jqElement = $(element);
// Remove Old Results
			$('div.inlineSearch').remove();
			if(data.data.length > 0) {
				var list = {};
				var listHtml = '';
				for(var i = 0; i < data.data.length; i++) {
					var nodeId = data.data[i][data.node].id;
					var nodeName = data.data[i][data.node].name;
					list[nodeId] = data.data[i][data.node].name;
					listHtml += '<li data-id="'+nodeId+'">'+nodeName+'</li>';
				}

				var firstState = (data.paginator.prevPage) ? '' : ' active';
				var nextState = (data.paginator.prevPage) ? '' : ' active';
				var prevState = (data.paginator.nextPage) ? '' : ' active';
				var lastState = (data.paginator.nextPage) ? '' : ' active';

				var paginatorFirst = '<li class="first'+firstState+'">First</li>';
				var paginatorPrev = '<li class="prev'+prevState+'">Previous</li>';
				var paginatorPage = '<li class="page">'+data.paginator.page+' of '+data.paginator.pageCount+'</li>';
				var paginatorNext = '<li class="next'+nextState+'">Next</li>';
				var paginatorLast = '<li class="last'+lastState+'">Last</li>';

				var pageing = paginatorFirst + paginatorPrev + paginatorPage + paginatorNext + paginatorLast;

				listHtml = '<ul class="inlineSearchResults">' + listHtml + '</ul>';
				listHtml = '<div class="inlineSearch inlineSearch_'+data.node+'">'+listHtml+'<ul class="inlineSearchPaginator">'+pageing+'</ul></div>';
				var listObj = $(listHtml);
				element.listObj = listObj;

				listObj.find('.inlineSearchPaginator li.first').bind('click', {listObj: listObj, element: element}, this.firstPage);
				listObj.find('.inlineSearchPaginator li.prev').bind('click', {listObj: listObj, element: element}, this.prevPage);
				listObj.find('.inlineSearchPaginator li.next').bind('click', {listObj: listObj, element: element}, this.nextPage);
				listObj.find('.inlineSearchPaginator li.last').bind('click', {listObj: listObj, element: element}, this.lastPage);
console.log(this);
console.log(listObj);

				listObj.find('.inlineSearchResults li').bind('click', {data: data}, app.inlineSearch.resultClick[data.node]);
			} else {
				var listHtml = '<div class="inlineSearch inlineSearchNoResults inlineSearch_'+data.node+'">No Ingredients Found</div>';
				var listObj = $(listHtml);
			}
			var offset = jqElement.offset();
			listObj.css({top: offset.top, left: offset.left}).appendTo(document.body);
		},
// Keys to ignore as they're not character keys
		skipKeys: [
			0,	//	AltGr
			9,	//	Tab
			16,	//	Shift
			17,	//	Ctrl
			18,	//	Alt
			20,	//	CapsLock
			33,	//	PgUpKey
			34,	//	PgDownKey
			35,	//	EndKey
			36,	//	HomeKey
			37,	//	Left Arrow
			38,	//	Up Arrow
			39,	//	Right Arrow
			40,	//	Down Arrow
			42,	//	PntScreen
			45,	//	InsertKey
			46,	//	DeleteKey
			91,	//	MetaL
			92,	//	MetaR
			93,	//	ContextKey
			144,	//	NumLock
			145,	//	ScrLock
			19,	//	Pause
		],
		keyUp: function(e) {
			if($.inArray(e.keyCode, e.data.that.skipKeys) > -1) {
				return;
			}
			if(typeof(this.lastAjax) == 'object') {
				this.lastAjax.abort();
			}
			if((this.value.length == 0) && (typeof(this.listObj) == 'object')) {
				this.listObj.remove();
				return;
			}
			var that = this;
			this.lastAjax = $.get(app.base + 'ingredients/search.json', {search: this.value}, function(data){app.inlineSearch.updateList(data, that)});
		}
	}

};

$(document).ready(function(){
	app.inlineSearch._init();
});
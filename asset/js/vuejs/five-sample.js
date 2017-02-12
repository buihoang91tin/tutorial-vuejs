var services_data = [
	{
		name: 'Development',
		price: 300,
		active:true
	},{
		name: 'Design',
		price: 400,
		active:false
	},{
		name: 'Integration',
		price: 250,
		active:false
	},{
		name: 'Training',
		price: 220,
		active:false
	}
];

var articles_data = [
	{
        "title": "What You Need To Know About CSS Variables",
        "url": "http://tutorialzine.com/2016/03/what-you-need-to-know-about-css-variables/",
        "image": {
            "large": "http://cdn.tutorialzine.com/wp-content/uploads/2016/03/css-variables.jpg",
            "small": "http://cdn.tutorialzine.com/wp-content/uploads/2016/03/css-variables-150x150.jpg"
        }
    },
    {
        "title": "Freebie: 4 Great Looking Pricing Tables",
        "url": "http://tutorialzine.com/2016/02/freebie-4-great-looking-pricing-tables/",
        "image": {
            "large": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/great-looking-pricing-tables.jpg",
            "small": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/great-looking-pricing-tables-150x150.jpg"
        }
    },
    {
        "title": "20 Interesting JavaScript and CSS Libraries for February 2016",
        "url": "http://tutorialzine.com/2016/02/20-interesting-javascript-and-css-libraries-for-february-2016/",
        "image": {
            "large": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/interesting-resources-february.jpg",
            "small": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/interesting-resources-february-150x150.jpg"
        }
    },
    {
        "title": "Quick Tip: The Easiest Way To Make Responsive Headers",
        "url": "http://tutorialzine.com/2016/02/quick-tip-easiest-way-to-make-responsive-headers/",
        "image": {
            "large": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/quick-tip-responsive-headers.png",
            "small": "http://cdn.tutorialzine.com/wp-content/uploads/2016/02/quick-tip-responsive-headers-150x150.png"
        }
    },
    {
        "title": "Learn SQL In 20 Minutes",
        "url": "http://tutorialzine.com/2016/01/learn-sql-in-20-minutes/",
        "image": {
            "large": "http://cdn.tutorialzine.com/wp-content/uploads/2016/01/learn-sql-20-minutes.png",
            "small": "http://cdn.tutorialzine.com/wp-content/uploads/2016/01/learn-sql-20-minutes-150x150.png"
        }
    },
    {
        "title": "Creating Your First Desktop App With HTML, JS and Electron",
        "url": "http://tutorialzine.com/2015/12/creating-your-first-desktop-app-with-html-js-and-electron/",
        "image": {
            "large": "http://cdn.tutorialzine.com/wp-content/uploads/2015/12/creating-your-first-desktop-app-with-electron.png",
            "small": "http://cdn.tutorialzine.com/wp-content/uploads/2015/12/creating-your-first-desktop-app-with-electron-150x150.png"
        }
    }
];

Vue.filter('currency', function(value){
	return '$' + value.toFixed(2);
});

Vue.component('InlineEditor', {
	template:`
		<div class='wrap-first' v-on:click="hideTooltop" >
		<div class="tooltip" v-on:click.stop v-if="show_tooltip">
			<input type="text" v-model="text_content" />
		</div>
		<p v-on:click.stop="toggleTooltip">{{text_content}}</p>
		</div>
	`,
	data:function(){
		return{
			show_tooltip:false,
			text_content: 'Edit me by click me',
		}
	},
	methods:{
		hideTooltop: function(){
			this.show_tooltip = false;
		},

		toggleTooltip: function(){
			this.show_tooltip = !this.show_tooltip;
		}
	}
});

Vue.component('OrderComponent', {
	template:`
		<form v-cloak>
			<h1>Services</h1>
			<ul>
				<li v-for="service in services" v-on:click="toggleActive(service)" v-bind:class="{ 'active': service.active}" >
				{{service.name}}<span>{{ service.price | currency}}</span>
			</ul>

			<div class="total">
				Total: <span>{{total() | currency }}</span>
			</div>
		</form>
		`,
	data:function(){
		return {services: services_data}
	},
	methods:{
		toggleActive: function(s){
			s.active =!s.active;
		},
		total: function(){
			var total = 0;
			this.services.forEach(function(s){
				if(s.active){
					total+=s.price;
				}
			});

			return total;
		}
	}
});

Vue.component('InstantSearch', {
	template:`
	<div>
		<form v-cloak>

		    <div class="bar">
		        <!-- Create a binding between the searchString model and the text field -->

		        <input type="text" v-model="searchString" placeholder="Enter your search terms" />
		    </div>

		    <ul>
		        <!-- Render a li element for every entry in the computed filteredArticles array. -->
		             
		        <li v-for="article in filteredArticles">
		            <a v-bind:href="article.url"><img v-bind:src="article.image.small" /></a>
		            <p>{{article.title}}</p>
		        </li>
		    </ul>

		</form>
	</div>
	`,
	data: function(){
		return { searchString: '', articles: articles_data}
	},
	computed:{
		filteredArticles: function(){
			var articles_array = this.articles,
			searchString = this.searchString;

			if(!searchString){
				return articles_array;
			}

			searchString = searchString.trim().toLowerCase();

			articles_array = articles_array.filter(function(item){
				if(item.title.toLowerCase().indexOf(searchString) !== -1){
					return item;
				}
			});

			return articles_array;
		}
	}
});

Vue.component('SwitchableGrid', {
	template:`
		<div>
			<form v-cloak>
				<div class="bar">
					<a class="list-icon" v-bind:class="{ 'active': layout == 'list'}" v-on:click="layout='list'"></a>
					<a class="grid-icon" v-bind:class="{ 'active': layout == 'grid'}" v-on:click="layout='grid'"></a>
				</div>

				<!-- We have two layouts. We choose which one to show depending on the "layout" binding -->
				<ul v-if="layout == 'grid'" class="grid">
					<li v-for="a in articles">
						<a v-bind:href="a.url" target="_blank"><img v-bind:src="a.image.large" /></a>
					</li>
				</ul>
				<ul v-if="layout == 'list'" class="list">
					<!-- A compact view smaller photos and titles -->
					<li v-for="a in articles">
						<a v-bind:href="a.url" target="_blank"><img v-bind:src="a.image.small" /></a>
						<p>{{a.title}}</p>
					</li>
				</ul>
			</form>			
		</div>
		
	`,
	data: function(){
		return { layout:'grid', articles: articles_data}
	},

});

var demo = new Vue({
	el: '#events',
	data:{
		active:'sample1',
		currentView: 'InlineEditor',
		
	},

	methods:{
		makeActive:function(item){
			this.active = item;
			switch(item){
				case 'sample2': this.currentView = "OrderComponent"; break;
				case 'sample3' : this.currentView = "InstantSearch"; break;
				case 'sample4' : this.currentView = 'SwitchableGrid'; break;
				default: this.currentView = 'InlineEditor'; break;
			}
		},

		
	}
});



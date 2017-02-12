var eventsz = [
	{
		id: 1,
		name: 'TIFF',
		description: 'Toronto International Film Festival',
		date: '2015-09-10'
	},
	{
        id: 2,
        name: 'The Martian Premiere',
        description: 'The Martian comes to theatres.',
        date: '2015-10-02'
      },
      {
        id: 3,
        name: 'SXSW',
        description: 'Music, film and interactive festival in Austin, TX.',
        date: '2016-03-11'
      }
];

var vue = new Vue({
	el: '#events',

	data:{
		event:{name:'', description:'', date:''},
		events:[

		]
	},

	mounted:function(){
		this.fetchEvents();
	},

	methods:{
		fetchEvents: function(){
			this.events = [];
			this.events = eventsz;
			//Vue.set(events, eventsz);
			//console.log(events);

			this.$http.get('backend/index.php').then(
			function(response){
				//console.log(response['body']);
				event_get = response['body'];
				for(var index in event_get){
					this.events.push(event_get[index]);
				}
				
			}, function (err){
				console.log(err);
			});
		},

		addEvent: function(){
			if(this.event.name!= ''){
				//this.events.push(this.event);
				//this.event = {name: '', description:'', date: ''};
				console.log(this.event);
				this.$http.post('backend/index.php', {event:this.event},{
					   emulateJSON: true
					}).then(
					function(response){
						this.events.push(response['body']['event']);
					},
					function(err){

					});
			}
		},
		deleteEvent: function(index){
			console.log(index);
			if(confirm('Do you want to delete this event?')){
				this.events.splice(index, 1);
			}
		}
	}
});
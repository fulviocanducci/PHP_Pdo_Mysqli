<!DOCTYPE html>
<html>
<head>
	<title>VueJs</title>
	<script src="vue.min.js"></script>
</head>
<body>
	<div id="app">
		{{title | upperCase}}
		<br />
		<input type="text" v-model="searchText"/>
		<br />
		<ul>
			<li v-repeat="items | filterBy nameFilter">
      			{{id}} {{name}}
    		</li>
		</ul>
	</div>
	<script>
		var vm = new Vue({
			el: '#app',
			data: {
				title: 'Pesquisa',
				items: [
					{id: 1, name:'Paul Lima'},
					{id: 2, name:'souza Cruz'},
					{id: 3, name:'Adael cruz'},
					{id: 4, name:'Pául lima'},
					{id: 5, name:'Pâul cruz'},
					{id: 6, name:'Sôuza Cruz'},
					{id: 6, name:'Cruz adael'},
					{id: 6, name:'Cruz líma'},
					{id: 6, name:'Adael Líma'}
				]
			},
  			methods: {
		      nameFilter: function(item) {
		      	if (!this.searchText || this.searchText === '') {
		      		return true;
		      	}
		      	var n = this.prepareNameFilter(item.name);
		      	var s = this.prepareNameFilter(this.searchText);		      	
		        return n.includes(s);
		      },
		      prepareNameFilter: function replaceSpecialChars(str)	{
		      	if (!str) return '';			    
			    str = str.toLowerCase();
			    str = str.replace(/[aáàãäâ]/,'a');
			    str = str.replace(/[eéèëê]/,'e');
			    str = str.replace(/[iíìïî]/,'i');
			    str = str.replace(/[oóòõöô]/,'o');
			    str = str.replace(/[uúùüû]/,'u');
			    return str;
			  }
		    }
		});		
	</script>
</body>
</html>
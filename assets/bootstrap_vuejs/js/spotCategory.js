//THE BASE URL
	var url = "http://localhost/LTIPC/";	
//this is for the category page in the admin panel
	var category = new Vue({
		el: "#category",
		data: {
			modal: false,
			modalDelete: false,
			modalEdit: false,
			categoryInfo:{category: '', id: ''},
			message: '',
			categories: []
		},
		mounted: function(){

			this.getCategory();

		},
		methods: {

			addCategory: function(){

				var datas = district.toFormData(category.categoryInfo);
				axios.post(url+"index.php/dashboard/addCategory", datas).then(function(response){

					category.message = response.data;
					category.getCategory();
					category.categoryInfo.category = "";

				});

			},
			deleteCategory: function(){
				var datas = district.toFormData(category.categoryInfo);
				axios.post(url+"index.php/dashboard/deleteCategory", datas).then(function(response){

					category.message = response.data;
					category.getCategory();

				});

			},
			editCategory: function(){

				var datas = district.toFormData(category.categoryInfo);
				axios.post(url+"index.php/dashboard/editCategory", datas).then(function(response){

					category.message = response.data;
					category.getCategory();

				});

			},
			getCategory: function(){
				axios.get(url+"index.php/dashboard/getCategory").then(function(response){

					category.categories = response.data;

				});
			}

		}

	});
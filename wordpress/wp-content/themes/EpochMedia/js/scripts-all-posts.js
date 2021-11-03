var stateAllPosts = {
	'itemsObjAll': [],
	'pageAll': 1,
	'rowsAll': 4,
	'windowAll': 5,
}
	let ajaxAllPosts = new XMLHttpRequest();

	ajaxAllPosts.open("GET", "http://localhost/wordpress/wp-json/api/all_posts/", true);
	ajaxAllPosts.onload = function(){

		if(this.status == 200){

			const allPosts = JSON.parse(this.responseText);
            stateAllPosts.itemsObjAll = allPosts;      
            DisplayAllPosts();
		}
	}

	ajaxAllPosts.onerror = function(){
	}

	ajaxAllPosts.send();

// function Profile_posts(items){
	
// 	for (var i = 0 in items) {
// 		stateMyPosts.itemsObj.push(items[i]);	
// 	}
// 	};
// 	return stateMyPosts.itemsObj;
// }

function DisplayAllPosts () {
	
	let x = moreThenThree(stateAllPosts.itemsObjAll);

    let all_posts_data = pagination(stateAllPosts.itemsObjAll, stateAllPosts.pageAll, stateAllPosts.rowsAll, 'all-posts');
    let all_posts_items = all_posts_data.itemsObjAll;
    
    for (var i = 1 in all_posts_items) {
        DisplayAllPostsItems(i, all_posts_items);
    };

	if(x == true){
    	pageButtons(all_posts_data.pages, stateAllPosts.windowAll, stateAllPosts.pageAll, '#all-posts');
	}
}

function DisplayAllPostsItems(i, items){

		
	// CREATE ELEMENTS
		// Row
		let row_all_posts_element = document.getElementById('all-posts');

			// Colummn
			let col_all_posts_div_element = document.createElement('div');

				// First div
				let div_all_posts_author_name_element = document.createElement('div');
				let h2_all_posts_text_center_element = document.createElement('h2');
				let a_all_posts_name_element = document.createElement('a');

					// Second div
					let div_all_posts_content_element = document.createElement('div')
					let h4_all_post_title_element = document.createElement('h4');
					let p_all_posts_content_element = document.createElement('p');

						// Third div
						let div_all_post_read_it_element = document.createElement('div');
						let h6_all_post_read_it_element = document.createElement('h6');
						let a_all_post_read_it_element = document.createElement('a');

							// Fourth div
							let div_all_post_image_element = document.createElement('div');
							let image_all_posts = document.createElement("IMG");

	// ADD CLASS OR ATTRIBUTES
		// Column
		col_all_posts_div_element.classList.add("col-md-6", "read-all-posts-content");
		
			// First div
			div_all_posts_author_name_element.classList.add("author-name");
			h2_all_posts_text_center_element.classList.add("text-center");

				// Second div
				div_all_posts_content_element.classList.add("post-content");
				h4_all_post_title_element.classList.add("text-center", "my-post-title");

					// Third div
					div_all_post_read_it_element.classList.add("read-it-link");

						// Fourth div
						div_all_post_image_element.classList.add("img-post");

	// ADD ATTRIBUTES
		// First div
		a_all_posts_name_element.setAttribute('target', '_blank');

				// Third div
				a_all_post_read_it_element.setAttribute('target', '_blank')

	// INSERT VALUES
		// First div
		let name = document.createTextNode(items[i].display_name);
		a_all_posts_name_element.href = "http://localhost/wordpress/user/" + items[i].user_login;

			// Second div
			let postContent = items[i].post_content;
			let content_lenght = postContent.length / 2;
				postContent = postContent.substring(0, content_lenght);
			let title = document.createTextNode(items[i].post_title);
			let content = document.createTextNode(postContent + " [...]");

				// Third div
				let read_post = document.createTextNode('Read it');
				a_all_post_read_it_element.href = "http://localhost/wordpress/" + items[i].post_title;

					// Fourth div
					if(items[i].meta_value != items[i].display_name){
						image_all_posts.src = items[i].meta_value;
					}

	// APPENDCHILDS
		// First div
		a_all_posts_name_element.appendChild(name);
		h2_all_posts_text_center_element.appendChild(a_all_posts_name_element);
		div_all_posts_author_name_element.appendChild(h2_all_posts_text_center_element);

			// Second div
			h4_all_post_title_element.appendChild(title);
			p_all_posts_content_element.appendChild(content);
			div_all_posts_content_element.appendChild(h4_all_post_title_element);
			div_all_posts_content_element.appendChild(p_all_posts_content_element);

				// Third div
				a_all_post_read_it_element.appendChild(read_post);
				h6_all_post_read_it_element.appendChild(a_all_post_read_it_element);
				div_all_post_read_it_element.appendChild(h6_all_post_read_it_element);

					// Fourth div
					div_all_post_image_element.appendChild(image_all_posts);
	// Column
	col_all_posts_div_element.append(div_all_posts_author_name_element, div_all_posts_content_element, div_all_post_read_it_element, div_all_post_image_element); 
	// Row
	row_all_posts_element.append(col_all_posts_div_element);

}
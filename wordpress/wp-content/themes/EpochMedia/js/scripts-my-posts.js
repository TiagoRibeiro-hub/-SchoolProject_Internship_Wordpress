// MY_POSTS
const queryString = window.location.href;

var stateMyPosts = {
	'itemsObj': [],
	'page': 1,
	'rows': 3,
	'window': 5,
}
	let ajaxMyPosts = new XMLHttpRequest();

	ajaxMyPosts.open("GET", "http://localhost/wordpress/wp-json/api/my_posts/", true);
	ajaxMyPosts.onload = function(){

		if(this.status == 200){
			const items = JSON.parse(this.responseText);
			Profile_posts(items);
			DisplayMyPosts();
		}
	}

	ajaxMyPosts.onerror = function(){
	}

	ajaxMyPosts.send();

function Profile_posts(items){
	
	for (var i = 0 in items) {
		if(queryString.includes(items[i].user_nicename)){
			stateMyPosts.itemsObj.push(items[i]);	
		}
	};
	return stateMyPosts.itemsObj;
}

function DisplayMyPosts () {
	
	let x = moreThenThree(stateMyPosts.itemsObj)
	let data_My_Posts = pagination(stateMyPosts.itemsObj, stateMyPosts.page, stateMyPosts.rows, 'my-posts');
	let my_posts_items = data_My_Posts.itemsObj;

	for (var i = 1 in my_posts_items) {
		if(queryString.includes(my_posts_items[i].user_nicename)){
			DisplayMyPoststItems(i, my_posts_items);
		}
	};
	if(x == true){
		pageButtons(data_My_Posts.pages, stateMyPosts.window, stateMyPosts.page, '#my-posts');
	}

}

function DisplayMyPoststItems(i, items){
	
	// CREATE ELEMENTS
		// Row
		let row_element = document.getElementById('my-posts');

			// Colummn
			let col_my_posts_div_element = document.createElement('div');

				// First div
				let div_author_name_element = document.createElement('div');
				let h3_text_center_element = document.createElement('h3');
				let a_name_element = document.createElement('a');

					// Second div
					let div_all_video_content = document.createElement('div')
					let h5_my_post_title_element = document.createElement('h5');
					let p_content_element = document.createElement('p');

						// Third div
						let div_post_title_video = document.createElement('div');
						let h6_post_title_video_element = document.createElement('h6');
						let a_post_title_video_element = document.createElement('a');

	// ADD CLASS OR ATTRIBUTES
		// Column
		col_my_posts_div_element.classList.add("col-md-4", "all-video-div");
		
			// First div
			div_author_name_element.classList.add("author-name");
			h3_text_center_element.classList.add("text-center");

				// Second div
				div_all_video_content.classList.add("all-video-content");
				h5_my_post_title_element.classList.add("text-center", "my-post-title");

					// Third div
					h6_post_title_video_element.classList.add("post-title-video");
					a_post_title_video_element.classList.add("post-title-video-a");

	// ADD ATTRIBUTES
		// First div
		a_name_element.setAttribute('target', '_blank');

				// Third div
				a_post_title_video_element.setAttribute('target', '_blank')

	// INSERT VALUES
		// First div
		let name = document.createTextNode(items[i].display_name);
		a_name_element.href = "http://localhost/wordpress/user/" + items[i].user_login;

			// Second div
			let postContent = items[i].post_content;
			let content_lenght = postContent.length / 2;
			postContent = postContent.substring(0, content_lenght);
			let title = document.createTextNode(items[i].post_title);
			let content = document.createTextNode(postContent + " [...]");

				// Third div
				let read_post = document.createTextNode('Read it');
				a_post_title_video_element.href = "http://localhost/wordpress/" + items[i].post_title;

	// APPENDCHILDS
		// First div
		a_name_element.appendChild(name);
		h3_text_center_element.appendChild(a_name_element);
		div_author_name_element.appendChild(h3_text_center_element);

			// Second div
			h5_my_post_title_element.appendChild(title);
			p_content_element.appendChild(content);
			div_all_video_content.appendChild(h5_my_post_title_element);
			div_all_video_content.appendChild(p_content_element);

				// Third div
				a_post_title_video_element.appendChild(read_post);
				h6_post_title_video_element.appendChild(a_post_title_video_element);
				div_post_title_video.appendChild(h6_post_title_video_element);

	// Column
	col_my_posts_div_element.append(div_author_name_element, div_all_video_content, div_post_title_video);
	// Row
	row_element.append(col_my_posts_div_element);
}



      
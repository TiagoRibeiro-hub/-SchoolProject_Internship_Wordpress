var stateVideos = {
	'itemsObjV': [],
	'pageV': 1,
	'rowsV': 3,
	'windowV': 5,
}
	let ajaxVideo = new XMLHttpRequest();

	ajaxVideo.open("GET", "http://localhost/wordpress/wp-json/api/all_videos/", true);
	ajaxVideo.onload = function(){

		if(this.status == 200){

			const videos = JSON.parse(this.responseText);
            stateVideos.itemsObjV = videos;
            DisplayAllVideos();

		}
	}

	ajaxVideo.onerror = function(){
	}

	ajaxVideo.send();

function DisplayAllVideos () {
	
	let x = moreThenThree(stateAllPosts.itemsObjAll);

    let data_all_videos = pagination(stateVideos.itemsObjV, stateVideos.pageV, stateVideos.rowsV, 'all-videos');
    let all_videos_items = data_all_videos.itemsObjV;
    
    for (var i = 1 in all_videos_items) {
        DisplayAllVideosItems(i, all_videos_items);
    };

	if(x == true){
    	pageButtons(data_all_videos.pages, stateVideos.windowV, stateVideos.pageV, '#all-videos');
	}
}	

function DisplayAllVideosItems(i, items){
	
	// CREATE ELEMENTS
		// Row
		let row_video_element = document.getElementById('all-videos');

			// Colummn
			let col_all_video_div_element = document.createElement('div');

				// First div
				let div_author_name_video_element = document.createElement('div');
				let h2_text_center_video_element = document.createElement('h2');
				let a_name_video_element = document.createElement('a');

					// Second div
					let div_all_video_content = document.createElement('div')
				    let a_name_video_url_element = document.createElement('a');
					let h3_post_description_video_element = document.createElement('h3');
					let h6_my_post_title_element = document.createElement('h6');
					let p_content_video_element = document.createElement('p');

	// ADD CLASS OR ATTRIBUTES
		// Column
		col_all_video_div_element.classList.add("col-md-4", "all-video-div");
		
			// First div
			div_author_name_video_element.classList.add("author-name");
			h2_text_center_video_element.classList.add("text-center");

				// Second div
				div_all_video_content.classList.add("all-video-content");
        		a_name_video_url_element.classList.add("post-title-video-a");
				h3_post_description_video_element.classList.add("text-center", "post-title-video");
                h6_my_post_title_element.classList.add("post-description-video");

	// ADD ATTRIBUTES
		// First div
		a_name_video_element.setAttribute('target', '_blank');

            // Second div
            a_name_video_url_element.setAttribute('target', '_blank');

	// INSERT VALUES
		// First div
		let name_author = document.createTextNode(items[i].display_name);
		a_name_video_element.href = "http://localhost/wordpress/user/" + items[i].user_login;

			// Second div
            let post_video_title = document.createTextNode(items[i].post_title);
				a_name_video_url_element.href = items[i].meta_value;
            let description = document.createTextNode("Description:");
			let content = document.createTextNode(items[i].post_content);


	// APPENDCHILDS
		// First div
		a_name_video_element.appendChild(name_author);
		h2_text_center_video_element.appendChild(a_name_video_element);
		div_author_name_video_element.appendChild(h2_text_center_video_element);

			// Second div
            a_name_video_url_element.appendChild(post_video_title);
			h3_post_description_video_element.appendChild(a_name_video_url_element);
			h6_my_post_title_element.appendChild(description);
			p_content_video_element.appendChild(content);
			div_all_video_content.appendChild(h3_post_description_video_element);
			div_all_video_content.appendChild(h6_my_post_title_element);
			div_all_video_content.appendChild(p_content_video_element);


	// Column
	col_all_video_div_element.append(div_author_name_video_element, div_all_video_content);
	// Row
	row_video_element.append(col_all_video_div_element);
}

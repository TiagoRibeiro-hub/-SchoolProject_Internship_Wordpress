function moreThenThree(itemsObj){
    
    if(itemsObj.length >= 4){
        return true;
    }else{
        return false;
    }
}

function pagination(itemsObj, page, rows, TAB) {

	let trimStart = (page - 1) * rows
    let trimEnd = trimStart + rows
    let trimmed_Data = itemsObj.slice(trimStart, trimEnd)

    let pages = Math.round(itemsObj.length / rows);
    
    if(pages == 1){
        pages = 2;
    }

    if(TAB == 'all-posts'){
        return {
            'itemsObjAll': trimmed_Data,
            'pages': pages,
        }
    }
    
    if(TAB == 'my-posts'){
        return {
            'itemsObj': trimmed_Data,
            'pages': pages,
        }
    }

    if(TAB == 'all-videos'){
        return {
            'itemsObjV': trimmed_Data,
            'pages': pages,
        }
    }
    
}

function pageButtons(pages, state_window, state_page, TAB) {
    let pagination_element = document.getElementById('pagination');
	pagination_element.innerHTML = "";

	var maxLeft = (state_page - Math.floor(state_window / 2))
    var maxRight = (state_page + Math.floor(state_window / 2))

    if (maxLeft < 1) {
        maxLeft = 1
        maxRight = state_window
    }

    if (maxRight > pages) {
        maxLeft = pages - (state_window - 1)
        
        if (maxLeft < 1){
        	maxLeft = 1
        }
        maxRight = pages
    }

	for(var page= maxLeft; page <= maxRight; page++){
		pagination_element.innerHTML += `<button value=${page} class="btn-page btn btn-sm btn-info" onclick = "changePage(this.value, '${TAB}')">${page}</button>`
	}

	if (state_page != 1) {
        pagination_element.innerHTML = `<button value=${1} class="btn-page btn btn-sm btn-info" onclick = "changePage(this.value, '${TAB}')">&#171 First</button>` + pagination_element.innerHTML
    }

    if (state_page != pages) {
        pagination_element.innerHTML += `<button value=${pages} class="btn-page btn btn-sm btn-info" onclick = "changePage(this.value, '${TAB}')">Last &#187</button>`
    }

	
}

function changePage(page_value, TAB){

	document.querySelector(TAB).innerHTML="";

    if(TAB == '#all-posts'){ 
        stateAllPosts.pageAll = page_value;
	    DisplayAllPosts();
    }

    if(TAB == '#my-posts'){ 
        stateMyPosts.page = page_value;
        DisplayMyPosts();
    }

    if(TAB == '#all-videos'){ 
        stateVideos.pageV = page_value;
	    DisplayAllVideos();
    }
	
}
function deleteButtonPressed($postID){
    if(confirm("Are you sure want to delete this post?") == true){
        window.location='delete/'+$postID
    }
}
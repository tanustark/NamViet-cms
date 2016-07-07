function deleteButtonPressed($postID){
    if(confirm("Are you sure want to delete this post?") == true){
        window.location='delete/'+$postID
    }
}

function taskDeleteButtonPressed($taskID){
    if(confirm("Are you sure want to delete this task?") == true){
        window.location='tasks/delete/'+$taskID
    }
}

function successButtonPressed($taskID){
    if(confirm("Are you sure complete this task?") == true){
        window.location='/tasks/success/'+$taskID
    }
}

function notSuccessButtonPressed($taskID){
    if(confirm("Are you sure this task is not completed?") == true){
        window.location='tasks/notsuccess/'+$taskID
    }
}

function deleteStaffButtonPressed($staffID){
    if(confirm("Are you sure want to delete this staff?") == true){
        window.location='staffs/delete/'+$staffID
    }
}

function commentDeleteButtonPressed($cmtID){
    if(confirm("Are you sure want to delete this comment?") == true){
        window.location='/comments/delete/'+$cmtID
    }
}

function createPostButtonPressed(){
    window.location='/posts/create'
}

function managePostButtonPressed(){
    window.location='/posts/manage'
}

function allPostButtonPressed(){
    window.location='/posts'
}

function deleteMyPostButtonPressed($postID){
    if(confirm("Are you sure want to delete this post?") == true){
        window.location='/posts/delete/'+$postID
    }
}

function acceptPostButtonPressed($postID){
    if(confirm("Are you sure want to accept this post to be published into Main Site?") == true){
        window.location='/posts/publish/'+$postID
    }
}

function removePostButtonPressed($postID){
    if(confirm("Are you sure want to remove this post from Main Site?") == true){
        window.location='/posts/remove/'+$postID
    }
}

function highlightPostButtonPressed($postID){
    if(confirm("Are you sure want to highlight this post?") == true){
        window.location='/posts/highlight/'+$postID
    }
}

function editPostButtonPressed($postID){
    window.location='/posts/edit/'+$postID
}

function editMyPostButtonPressed($postID){
    window.location='/posts/myposts/edit/'+$postID
}

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});


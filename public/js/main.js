
    var video = document.getElementById("video");
    var WindowWidth = window.innerWidth;
    if(document.body.contains(video)) {
        if (WindowWidth < 400) {
            video.setAttribute("width", "260px");
            video.setAttribute("height", "160px");
        } else if (WindowWidth < 1000) {
            video.setAttribute("width", "320px");
            video.setAttribute("height", "240px");
        } else {
            video.setAttribute("width", "640px");
            video.setAttribute("height", "360px");
        }
    }

    var like = document.getElementById("like");
    var dislike = document.getElementById("dislike");

    //like funtion here
    $("#like").on("click", function(e) {
        // $("#sendlike").submit();
    })

    $("#sendlike").on("submit", function (e) {
        e.preventDefault();
        var amvid = document.getElementById("amvid").value;
        var userid = document.getElementById("userId").value;
        var addlike = parseInt(document.getElementById('likeCount').textContent) + 1;
        var likeData = addlike;
        var url = "{{ route('amvtube.like', ':id') }}";
        url = url.replace(':id', amvid);
        var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "POST",
                url: '/amvtube/like/'+amvid+'/'+likeData+'/'+userid,
                data: {'_method':'POST', '_token': token},
                dataType: 'json',
            }).done(function(response){
                console.log("Done");
            });
            $('#like').prop("disabled", true)
            $('#like').removeClass("btn-outline-light");
            $('#like').addClass("btn-light");
            $('#likeicon').removeClass("fa-regular");
            $('#likeicon').addClass("fa-solid");
            $('#likeCount').text(likeData);
        return false;
    });
     //dislike funtion here
     $("#disLike").on("click", function(e) {
        // $("#sendlike").submit();
    })

    $("#sendDisLike").on("submit", function (e) {
        e.preventDefault();
        var amvid = document.getElementById("amvid").value;
        var userid = document.getElementById("userId").value;
        var adddislike = parseInt(document.getElementById("disLikeCount").textContent) + 1;
        console.log(adddislike)
        var disLikeData = adddislike;
        var url = "{{ route('amvtube.dislike', ':id') }}";
        url = url.replace(':id', amvid);
        var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "POST",
                url: '/amvtube/dislike/'+amvid+'/'+disLikeData+'/'+userid,
                data: {'_method':'POST', '_token': token},
                dataType: 'json',
            }).done(function(response){
                console.log("done");
            });
            $('#disLike').prop("disabled", true)
            $('#disLike').removeClass("btn-outline-light");
            $('#disLike').addClass("btn-light");
            $('#dislikeicon').removeClass("fa-regular");
            $('#dislikeicon').addClass("fa-solid");
            $('#disLikeCount').text(disLikeData);
            return false;
    });

    //subscribe function here
    $("#sub").on("click", function(e) {
    })

    $("#subscribe").on("submit", function (e) {
        e.preventDefault();
        var subCount = $("#subCount").textContent;
        var user_id = document.getElementById("userId").value;
        var userid = document.getElementById("ownerID").textContent;
        var addSub = parseInt(document.getElementById('subCount').textContent) + 1;
        var newSub = $("#subscribe").serialize();
        var subData = addSub;
        var url = "{{ route('amvtube.sub', ':id') }}";
        url = url.replace(':id', userid);
        var token = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: "POST",
                url: '/amvtube/sub/'+userid+'/'+subData+'/'+user_id+'?'+newSub,
                data: {'_method':'POST', '_token': token},
                dataType: 'json',
            }).done(function(response){
                console.log("good");
            });
            $('#sub').prop("disabled", true)
            $('#sub').removeClass("btn-outline-light");
            $('#sub').addClass("btn-light");
            $('#subs').text(subData + " Subscribers");
        return false;
    });

    $('#video').bind('ended', function() {
        var id = document.getElementById("idForView").textContent;
        console.log(id);
        $.ajax({
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/amvtube/newview/'+id,
        })
    });

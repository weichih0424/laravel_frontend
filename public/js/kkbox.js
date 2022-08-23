function slick(){
    $('.slider').slick({
        dots: false, //項目點點，預設為false
        arrows: true, //上下箭頭，預設為true
        autoplay: false, //自動撥放
        autoplaySpeed: 500, //自動撥放的切換速率，單位毫秒
        speed: 500, //切換速率，單位毫秒
        slidesToShow: 4, //一次顯示4個
        slidesToScroll: 4, //切換下一頁時移動4個
        infinite: false, //是否要loop，預設為true

        prevArrow: "<img class='a-left control-c prev slick-prev' src='storage/image/angle-left-solid.svg'>",
        nextArrow: "<img class='a-right control-c next slick-next' src='storage/image/angle-right-solid.svg'>",
        responsive: [
        {
            breakpoint: 1024, // RWD在1024寬度時切換顯示數量
            settings: {
                slidesToShow: 3, //一次顯示3個
                slidesToScroll: 3,//切換下一頁時移動3個
            }
        },{
            breakpoint: 600,// RWD在600寬度時切換顯示數量
            settings: {
                slidesToShow: 2,//一次顯示2個
                slidesToScroll: 2,//切換下一頁時移動2個
            }
        },
        ]
    });
}
function get_new_access_token(){
    var access_token;
    $.ajax({
        url: "https://cors-anywhere.herokuapp.com/"+"https://account.kkbox.com/oauth2/token",
        type: "POST",
        dataType: "json",
        async: false,
        headers: {
            "Content-type": "application/x-www-form-urlencoded",
        },
        data: {
            grant_type : "client_credentials",
            client_id : "3dd2c0451be942b8781596701f0cee7f",
            client_secret : "82f1d5d667c7b42dbb85c550410b211d"
        },
        success: function(data) {
            access_token = data.access_token;
            console.log(data);
        },
        error: function (jqXHR,textStatus,errorThrown) {
            console.log("no get access_token");
            // console.log(jqXHR);
        }
    })
    return access_token;
}
function ajax_chart_playlists(){
    var access_token = get_new_access_token();
    var access_token = access_token!=""&&access_token!=null ? access_token : "NO";
    console.log(access_token);
    $.ajax({
        // url: "/kkbox/chart_playlists",
        url: "https://api.kkbox.com/v1.1/charts?territory=TW",
        type: "GET",
        headers: {
            Accept: "application/json; charset=utf-8",
            // Authorization: "Bearer rNvDBTEbtRbw5EQPirT2gg=="
            Authorization: "Bearer " + access_token
        },
        data: "",
        dataType: "json",
        success: function(data) {
            var html='';
            var html_2='';
            var array_1 = [];
            var array_2 = [];

            data.data.forEach(function(item,key){
                if(item.title.indexOf("新歌")!=-1){
                    array_1.push(item);
                }else{
                    array_2.push(item);
                }
                // switch (item.title){
                //     case "綜合新歌即時榜":
                //     case "華語新歌日榜":
                //         array_2.push(item);
                //     break;
                //     default:
                //         array_1.push(item);
                // }
            })
            // console.log(array_1);
            array_1.forEach(function(item){
                html+="<div>";
                html+="<div class='row'>";
                html+="<div class='title'>";
                html+="<p>"+item["title"]+"</p>";
                html+="</div>";
                var playlists_detail = ajax_chart_playlists_detail(item["title"], item["id"]);
                html+="<div class='col'>";
                playlists_detail.forEach(function(item2,key){
                    key=key+1;
                    html+="<div class='new_song'>";
                    html+="<div class='number'>"+key+"</div>";
                    html+="<div class='detail_image'>";
                    html+="<div class='image_button'>";
                    html+="<button type='button' class='play_button' id='"+item2['id']+"'>";
                    html+="<sapn>播放</span>";
                    html+="</button>";
                    html+="</div>";
                    html+="<div class='image'>";
                    html+="<img src='"+item2["album"]["images"][0]["url"]+"'>";
                    html+="</div>";
                    html+="<div class='image_hover'>";
                    html+="<span><img src='/storage/image/play_video.png'></span>";
                    html+="</div>";
                    html+="</div>";
                    html+="<div class='detail_name'>";
                    html+="<p class='song_name'>"+item2["name"]+"</p>";
                    html+="<p class='song_artist'>"+item2["album"]["artist"]["name"]+"</p>";
                    html+="</div>";
                    html+="</div>";
                })
                html+="</div>";
                html+="</div>";
                html+="</div>";
            })
            $("#new_song").html(html);

            // for (var i = 0;i<array_1.length;i++){
            //     html+="<div>";
            //     html+="<div id='row'>";
            //     html+="<div id='title'>";
            //     html+="<p>"+array_1[i]["title"]+"</p>";
            //     html+="</div>";
            //     var playlists_detail = ajax_chart_playlists_detail(array_1[i]["title"], array_1[i]["id"]);
            //     console.log(playlists_detail);

            //     html+="<div class='col'>";
            //     // html+="<p>"+playlists_detail["name"]+"</p>";
            //     html+="</div>";
            //     html+="</div>";
            //     html+="</div>";
            //     $("#new_song").html(html);
            // }

            // array_2.forEach(function(item){
            //     html_2+="<div>";
            //     html_2+="<div class='row'>";
            //     html_2+="<div class='title'>";
            //     html_2+="<p>"+item["title"]+"</p>";
            //     html_2+="</div>";
            //     var playlists_detail = ajax_chart_playlists_detail(item["title"], item["id"]);
            //     html_2+="<div class='col'>";
            //     playlists_detail.forEach(function(item2,key){
            //         key=key+1;
            //         html_2+="<div class='new_song'>";
            //         html_2+="<div class='number'>"+key+"</div>";
            //         html_2+="<div class='detail_image'>";
            //         html_2+="<img src='"+item2["album"]["images"][0]["url"]+"'>";
            //         html_2+="<div class='image_hover'>";
            //         html_2+="<span><img src='/storage/image/play_video.png'></span>";
            //         html_2+="</div>";
            //         html_2+="</div>";
            //         html_2+="<div class='detail_name'>";
            //         html_2+="<p class='song_name'>"+item2["name"]+"</p>";
            //         html_2+="<p class='song_artist'>"+item2["album"]["artist"]["name"]+"</p>";
            //         html_2+="</div>";
            //         html_2+="</div>";
            //     })
            //     html_2+="</div>";
            //     html_2+="</div>";
            //     html_2+="</div>";
            // })
            // $("#single").html(html_2);

            // for (var i = 0;i<data.data.length;i++){
            //     // console.log(data.data[i]);
            //     html+="<div>";
            //     html+="<p>"+data.data[i]["title"]+"</p>";
            //     // html+="<img src='"+data.data[i]["images"][0]["url"]+"''>";
            //     html+="</div>";

            //     // html+="<li>";
            //     // //url
            //     // html+="<a href='"+data.data[i]["url"]+"'>";
            //     // // title
            //     // html+="<div class='title'>";
            //     // html+="<h6>"+data.data[i]["title"]+"</h6>";
            //     // html+="</div>";
            //     // // image
            //     // // html+="<div class='image'>";
            //     // // html+="<img src='"+data.data[i]["images"][0]["url"]+"''>";
            //     // // html+="</div>";
            //     // html+="</a>";
            //     // html+="</li>";
            // }
            // // console.log(array_new);
            // // console.log(data.data[i]["title"]);
            // $(".slider").html(html);
            
            slick();
            post_web_player();
            // $('.slider').slick();
            // for(let i = 0; i < data.data.length; i++ ){
            //     console.log(data.data[i]);
            //     // let row = document.querySelector("#row");
            //     // let h3 = document.createElement("h3");
            //     // let slider_h3 = h3.setAttribute("id", "slider_h3_"+i);
            //     // h3.textContent=data.data[i]["title"];
            //     // row.appendChild(h3);
            //     let slider_h3 = document.querySelector("#slider_h3");
            //     let slider_img = document.querySelector("#slider_img");
            //     slider_img.setAttribute("src", data.data[i]["images"][0]["url"]);
            //     slider_h3.textContent=data.data[i]["title"];
            //     // console.log(row);
            // }
        },
        error: function (jqXHR,textStatus,errorThrown) {
            console.log(jqXHR);
        }
    });
}

function ajax_chart_playlists_detail(playlist_title,playlist_id){
    var result;
    $.ajax({
        url: "https://api.kkbox.com/v1.1/charts/"+playlist_id+"/tracks?territory=TW&offset=0&limit=5",
        type: "GET",
        headers: {
            Accept: "application/json; charset=utf-8",
            Authorization: "Bearer rNvDBTEbtRbw5EQPirT2gg=="
        },
        async: false,
        dataType: "json",
        success: function(data) {
            result = data.data;
        },
        error: function (jqXHR,textStatus,errorThrown) {
            console.log(jqXHR);
        }
    });
    return result;
}

function post_web_player(){
    $('.play_button').click(function(){
        var id = $(this).attr("id");          // equals：this.id
        // var name = $(this).attr("name");      // equals: this.name
        // var theClass = $(this).attr("class"); // equals: this.className
        // var value = $(this).attr("value");    // equals: this.value　// equals： $(this).val();
        // alert("id = " + id);
        $.ajax({
            url: "/kkbox/post",
            type: "POST",
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            data: {
                // id: $(this).val(),
                id: id,
            },
            dataType: "json",
            success: function(data) {
                console.log(id);
                $('#iframe_player').attr('src','https://widget.kkbox.com/v1/?id='+id+'&type=song&terr=TW&lang=TC');
                console.log("show player music success");
            },
            error: function (jqXHR,textStatus,errorThrown) {
                console.log(jqXHR);
            }
        });
        
    })
};
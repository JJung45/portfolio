$('document').ready(function(){
	indexMid();
	gnbLoc();
	
	$('.gnbBox').click(function(){
		$('.gnb').slideDown("slow");
	})
	
	
	$('.x-icon').click(function(){
		$('.gnb').slideUp("slow");
	})
	
	$('#upfile').change(function(){
		
		preImg(this);
	})
	
	$('.pic').css({
		width:$('.pic').width()+"px",
				
	});
	
})

$(window).resize(function(){
	indexMid();
	gnbLoc();
})

function indexMid(){
	var windowWidth = $(window).width();
	var windowHeight = $(window).height();
	var midWidth=$('.box').outerWidth();
	var midHeight=$('.box').outerHeight();
	
	$('.box').css({
		left: ((windowWidth-midWidth)/2)+"px",top: ((windowHeight-midHeight)/2)+"px"
	})
}

function gnbLoc(){
	var windowHeight = $(window).height();
	var gnbHeight = $('.gnbCon').height();
	
	$('.gnbCon').css({
		paddingTop: (windowHeight-gnbHeight)/3+"px"
	})
}

var img_files=[];
function preImg(chgFile){
	
	$('.upload').hide();
	$('.arrow').show();
	
	img_files=[];
	var filesArr = Array.prototype.slice.call(chgFile.files);
	
	var next=0;
	filesArr.forEach(function(f){
		if(!f.type.match("image.*")){
			alert('이미지 확장자만 가능합니다.');
			return;
		}
		
		img_files.push(f);
		
		
		var reader = new FileReader();
		reader.onload=function(e){
			++next;
			var html = "<img src=\""+e.target.result+"\" data-file='"+f.name+"' class='uploadImg' style='height:98%;margin: 0 auto;display:none;position:relative;' onclick='javascript:clickpos(event,"+next+")' usemap='#uploadImg"+next+"' id='uploadImg"+next+"' class='uploadImg'>";
			
				
			$('.uploadImg').css({
				display: "block"
			})
			
			$('.uploadGo').append(html);
		}
		
		
			$('.img').css({
				width:$('.img').width()+"px"
			})
			
			$('.uploadImg').css({
				width:$('.uploadImg').width()+"px",
				
			});
		
		reader.readAsDataURL(f);

		
	})
	
}

var slideIdx=1;
function plusImgs(n){

	showImgs(slideIdx+=n);
}

function showImgs(n){
	
	if(n>$('.uploadImg').length){
		slideIdx=1;
	}
	if(n<1){
		slideIdx=$('.uploadImg').length;
	}
	for(var i=0; i<$('.uploadImg').length; i++){
		$('.uploadImg').eq(i).css({
			display: "none"
		})
	}
	$('.uploadImg').eq(slideIdx-1).css({
		display: "block"
	})
}
		
function submitAction(){
	var now = new Date();
	var year = now.getFullYear();
	var mon = (now.getMonth()+1)>9? ''+(now.getMonth()+1):'0'+(now.getMonth()+1);
	var day = now.getDate()>9?''+now.getDate():'0'+now.getDate();
	var date = year+"/"+mon+"/"+day;
	
	var data = new FormData();
	var imgcount=img_files.length;
	
	if($('#id').val()){
		data.append("id",$('#id').val());
	}else{
	
		if(imgcount<1){
			alert('업로드할 파일을 선택하세요.');
			return;
		}
	}
	
	for(var i=0;i<imgcount; i++){
		var name = "img_"+i;
		data.append(name,img_files[i]);
	}
	data.append("img_count",imgcount);
	data.append("txt",$('#upfileTxt').val());
	
	data.append("date",date);
	
	var xhr = new XMLHttpRequest();
	
	if($('#id').val()){
		xhr.open("POST","updateOk.php");
		xhr.onload=function(e){
			if(this.status==200){

				alert(e.currentTarget.responseText);
				location.href="./mypage.php";
			}else{
				alert('포스팅 오류');
			}
		}
		xhr.send(data);
	}else{
		xhr.open("POST","createOk.php");
		xhr.onload=function(e){
			if(this.status==200){

				alert(e.currentTarget.responseText);
				location.href="./create.php";
			}else{
				alert('포스팅 오류');
			}
		}
		xhr.send(data);
	}
}

var showIdx=1;
function myarrow(n,next){
	var img = $('.col-6:nth-child('+next+') img.pic');
	showIdx=showIdx+n;
	
	if(showIdx>img.length){
		showIdx=1;
	}
	if(showIdx<1){
		showIdx=img.length;
	}
	for(var i=0; i<img.length; i++){
		img.eq(i).css({
			display: "none"
		})
	}
	img.eq(showIdx-1).css({
		display: "block"
	})
}

function likeOn(id){
	
	$.ajax({
		url: "likeOn.php",
		method:"POST",
		data: {id:id},
		success:function(response)
		{
			$('.likecount').html(response+"명");
		},
		error:function(){
			alert('error');
		}
	});
	
}

function clickpos(pos,next){
	var x=pos.pageX-80;
	var y=pos.pageY-60;
	var plus = '#uploadImg'+next;
	console.log($('#uploadImg'+next));
	$(".uploadGo").append("<map name='uploadImg"+next+"' style='background: #000;'><area shape='rect' coords='"+x+","+y+","+(x+50)+","+(y+20)+"' href='#' target='_blank'></map>");
}
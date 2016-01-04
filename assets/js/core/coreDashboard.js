//numPasien
/*
target="numPasien";
url=baseUrl+controller+"/data/"+target;
console.log(url);
 
// $.post(url,function(res){
	// console.log(res);
	// show="."+target;
	// $(show).empty().html(res);
// });
 
param={id:0}
res=sendAjax(url,param);
	res.success(function(result,status) {
		console.log(result);
		show="."+target;
		$(show).empty().html(result.body);
	});
	res.error(function(xhr,status,msg){			 
			console.log("Error");
			console.log(status);
			console.log(msg);
			console.log(xhr);
			
	});
*/	
//

 

target=[
	 "numAging",  "numAsuransi","numCompany",
	"numHomecare","numPasien","numBilling",
]

for(i=0;i<target.length;i++){
	show=target[i];
	url=baseUrl+controller+"/data/"+show;
	param={target:show}
	console.log(url);
	res=sendAjax(url,param);
	res.success(function(result,status) {
		console.log(result);
		divSHow="."+result.post.target;
		console.log("div:"+divSHow);
		$(divSHow).empty().html(result.body);
	});
	
	res.error(function(xhr,status,msg){			 
			console.log("Error");
			console.log(status);
			console.log(msg);
			console.log(xhr);
			
	});
}
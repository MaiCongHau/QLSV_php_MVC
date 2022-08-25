$(".delete").click(function (e) { 
    e.preventDefault();
    $dataURL =$(this).attr("data-url");
    $("#confirmModal a").attr("href",$dataURL);//thuộc tính của thẻ có id là #confirmModal và thuộc tính href của thằng con a của nó sẽ thay đổi theo biến truyền vào 
    $("#confirmModal").modal("show");//"#confirmModal" là id của modal
});

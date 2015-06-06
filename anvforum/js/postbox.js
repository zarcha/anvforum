'use strict';
var AddPStart = function (el,tag) {
    var selectedText = document.selection?document.selection.createRange().text:el.value.substring(el.selectionStart,el.selectionEnd);
    //document.myform.title.value = el.selectionStart + " " + el.selectionEnd;
    var newText='<'+tag+'>'+selectedText+'</'+tag+'>';
    var index;
    var firstPartString = "";
    var lastPartString = "";

    for(index = 0; index < el.value.length; ++index)
    {
        if(index < el.selectionStart)
        {
            firstPartString += el.value[index];
            
        }
        else if(index >= el.selectionEnd)
        {
            lastPartString += el.value[index];
        }
    }

    var newString = firstPartString + newText + lastPartString;

    el.value= newString;
};
var AddLinkStart = function () {
    var url=prompt("Please enter the images url.", "");

    if(url!=null)
    {
        var optText=prompt("Enter alternate text.", "");

        if(optText==null)
        {
            optText = url;   
        }

        document.getElementById("content").value += '<a href="' + url + '">' + optText + '</a>';
    }
};
var Image = function () {
    var url=prompt("Please enter the url.", "");

    if(url!=null)
    {
        var optText=prompt("Enter link text.", "");
        document.getElementById("content").value += '<img class="autoResizeImage" src="' + url + '" alt="' + optText +'">';
    }
};
var  List = function () {    
    var newtext = '<ol><li>Item1</li></ol>';
    document.getElementById("content").value += newtext;

};
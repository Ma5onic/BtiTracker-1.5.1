<?php if(!class_exists('raintpl')){exit;}?><script type="text/javascript">
	function wrap(v,r,e)
	{
		var r = r ? r : "";
		var v = v ? v : "";
		var e = e ? e : "";
		
		var obj = document.getElementById("<?php echo $text;?>");
		
		if (document.selection)
		{
			var str = document.selection.createRange().text;
			obj.focus();
			var sel = document.selection.createRange();
			sel.text = "["+v+(e ? "="+e : "")+"]" + (r ? r : str) + "[/"+v+"]";
        }
			else 
		{
			var len = obj.value.length;
			var start = obj.selectionStart;
			var end = obj.selectionEnd;
			var sel = obj.value.substring(start, end);
			obj.value =  obj.value.substring(0,start) + "[" + v +(e ? "="+e : "")+"]" + (r ? r : sel) + "[/" + v + "]" + obj.value.substring(end,len);
			obj.selectionEnd = start + v.length+e.length+sel.length+r.length+v.length+5;
			
		}
		obj.focus();
	}
	function clink()
	{
		var linkTitle;
		var linkAddr;
		
		linkAddr = prompt("Please enter the full URL","http://");
		if(linkAddr && linkAddr != "http://")
		linkTitle = prompt("Please enter the title", " ");
		
	  if(linkAddr && linkTitle)
		wrap('url',linkTitle,linkAddr);
	  
	}
	function cimage()
	{
		var link;
		link = prompt("Please enter the full URL for your image\nOnly .png, .jpg, .gif images","http://");
		var re_text = /\.jpg|\.gif|\.png|\.jpeg/i;
		if(re_text.test(link) == false && link != "http://" && link) {
				alert("Image not allowed only .jpg .gif .png .jpeg");
				link = prompt("Please enter the full URL for your image\nOnly .png, .jpg, .gif images","http://");
				}
	  if(link != "http://" && link)
		wrap('img',link,'');
	  
	}
	function tag(v)
	{
		wrap(v,'','');
	}
	function mail()
	{
		var email = ""; 
		email = prompt("Plese enter the email addres"," ");
		var filter = /^[\w.-]+@([\w.-]+\.)+[a-z]{2,6}$/i;
		if (!filter.test(email) && email.length > 1) {
			alert("Please provide a valid email address");
			email = prompt("Plese enter the email addres"," ");
		}
		if(email.length > 1)
		wrap('mail',email,'');
	}
	function text(to)
	{
		var obj = document.getElementById("<?php echo $text;?>");
		
		if (document.selection)
		{
			var str = document.selection.createRange().text;
			obj.focus();
			var sel = document.selection.createRange();
			sel.text = (to == 'up' ? str.toUpperCase() : str.toLowerCase())
        }
			else 
		{
			var len = obj.value.length;
			var start = obj.selectionStart;
			var end = obj.selectionEnd;
			var sel = obj.value.substring(start, end);
			obj.value =  obj.value.substring(0,start) + (to == 'up' ? sel.toUpperCase() : sel.toLowerCase()) + obj.value.substring(end,len);
		}
		obj.focus();
	
	}
	function fonts(w)
	{
		var fmin = 12; var fmax = 24;
		var obj = document.getElementById("<?php echo $text;?>");
		var size = obj.style.fontSize;
		size = (parseInt(size));
			var nsize ;
		if(w == 'up' && (size+1 < fmax))
			nsize = (size+1)+"px";
		if(w == 'down' && (size-1 > fmin))
			nsize = (size-1)+"px";
		
		obj.style.fontSize = nsize;
		obj.focus();
	}
	function font(w,f)
	{
		if(w == 'color')
			f = "#"+f;
			
		var obj = document.getElementById("<?php echo $text;?>");
		
		if (document.selection)
		{
			var str = document.selection.createRange().text;
			obj.focus();
			var sel = document.selection.createRange();
			sel.text = "["+w+"="+f +"]" + str + "[/"+w+"]";
        }
			else 
		{
			var len = obj.value.length;
			var start = obj.selectionStart;
			var end = obj.selectionEnd;
			var sel = obj.value.substring(start, end);
			obj.value =  obj.value.substring(0,start) + "[" + w +"="+f+"]" + sel + "[/" + w + "]" + obj.value.substring(end,len);
			obj.selectionEnd = start + w.length+(1+f.length)+sel.length+w.length+5;
		}
		document.getElementById("font"+w).selectedIndex = 0;
		obj.focus();
	}
	function em(f)
	{
		var obj = document.getElementById("<?php echo $text;?>");
		
		if (document.selection)
		{
			var str = document.selection.createRange().text;
			obj.focus();
			var sel = document.selection.createRange();
			sel.text = f;
        }
			else 
		{
			var len = obj.value.length;
			var start = obj.selectionStart;
			var end = obj.selectionEnd;
			var sel = obj.value.substring(start, end);
			obj.value =  obj.value.substring(0,start) +f+ obj.value.substring(end,len);
			obj.selectionEnd = start + f.length;
		}
			obj.focus();
	}
	</script>

<table cellpadding="5" cellspacing="0" align="left"  border="1" class="bb_holder">
  <tr>
    <td width="100%" style="padding:0" colspan="2">
    <div style="float:left;padding:4px 0px 0px 2px;"> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/bold.png" onclick="tag('b')" title="Bold" alt="B" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/italic.png" onclick="tag('i')" title="Italic" alt="I" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/underline.png" onclick="tag('u')" title="Underline" alt="U" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/strike.png" onclick="tag('s')" title="Strike" alt="S" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/link.png" onclick="clink()" title="Link" alt="Link" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/picture.png" onclick="cimage()" title="Add image" alt="Image"/> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/script.png" onclick="tag('code')" title="Add code" alt="Code" />
   </div>
      <div style="float:right;padding:4px 2px 0px 0px;"> 
      	<img class="bb_icon" src="./style/base/tpl/images/bbcode/align_center.png" onclick="wrap('align','','center')" title="Align - center" alt="Center" /> 		        <img class="bb_icon" src="./style/base/tpl/images/bbcode/align_left.png" onclick="wrap('align','','left')" title="Align - left" alt="Left" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/align_justify.png" onclick="wrap('align','','justify')" title="Align - justify" alt="justify" /> 		<img class="bb_icon" src="./style/base/tpl/images/bbcode/align_right.png" onclick="wrap('align','','right')" title="Align - right" alt="Right" /> 
      </div>
     </td>
  </tr>
  <tr>
    <td width="100%" style="padding:0;" colspan="2">
    <div style="float:left;padding:4px 0px 0px 2px;">
    	<select name="fontface" id="fontface"  class="bb_icon" onchange="font('face',this.value);" title="Font face">
          <option value="0">Font face</option>
          <option value="Arial" style="font-family: Arial;">Arial</option>
          <option value="Arial Black" style="font-family: Arial Black;">Arial Black</option>
          <option value="Comic Sans MS" style="font-family: Comic Sans MS;">Comic Sans MS</option>
          <option value="Courier New" style="font-family: Courier New;">Courier New</option>
          <option value="Franklin Gothic Medium" style="font-family: Franklin Gothic Medium;">Franklin Gothic Medium</option>
          <option value="Georgia" style="font-family: Georgia;">Georgia</option>
          <option value="Helvetica" style="font-family: Helvetica;">Helvetica</option>
          <option value="Impact" style="font-family: Impact;">Impact</option>
          <option value="Lucida Console" style="font-family: Lucida Console;">Lucida Console</option>
          <option value="Lucida Sans Unicode" style="font-family: Lucida Sans Unicode;">Lucida Sans Unicode</option>
          <option value="Microsoft Sans Serif" style="font-family: Microsoft Sans Serif;">Microsoft Sans Serif</option>
          <option value="Palatino Linotype" style="font-family: Palatino Linotype;">Palatino Linotype</option>
          <option value="Tahoma" style="font-family: Tahoma;">Tahoma</option>
          <option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
          <option value="Trebuchet MS" style="font-family: Trebuchet MS;">Trebuchet MS</option>
          <option value="Verdana" style="font-family: Verdana;">Verdana</option>
          <option value="Symbol" style="font-family: Symbol;">Symbol</option>
        </select>
		<select name="fontsize" id="fontsize" class="bb_icon" style="padding-bottom:3px;" onchange="font('size',this.value);" title="Font size">
			<option value="0">Font size</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
        </select>
        <select name="fontcolor" id="fontcolor" class="bb_icon" style="padding-bottom:3px;" onchange="font('color',this.value);" title="Font size">
			<option value="0">Font color</option>
			<option value="FF0000" style="color:#FF0000">Red</option>
			<option value="00FFFF" style="color:#00FFFF">Turquoise</option>
			<option value="0000FF" style="color:#0000FF">Light Blue</option>
			<option value="0000A0" style="color:#0000A0">Dark Blue</option>
			<option value="FF0080" style="color:#FF0080">Light Purple</option>
			<option value="800080" style="color:#800080">Dark Purple</option>
			<option value="FFFF00" style="color:#FFFF00">Yellow</option>
			<option value="00FF00" style="color:#00FF00">Pastel Green</option>
			<option value="C0C0C0" style="color:#C0C0C0">Light Grey</option>
			<option value="FF8040" style="color:#FF8040">Orange</option>
			<option value="808000" style="color:#808000">Forest Green</option>
        </select>
        
    </div>
      <div style="float:right;padding:4px 2px 0px 0px;"> 
      	<img class="bb_icon" src="./style/base/tpl/images/bbcode/text_uppercase.png" onclick="text('up')" title="To Uppercase" alt="Up" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/text_lowercase.png" onclick="text('low')" title="To Lowercase" alt="Low" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/zoom_in.png" onclick="fonts('up')" title="Font size up" alt="S up" /> 
        <img class="bb_icon" src="./style/base/tpl/images/bbcode/zoom_out.png" onclick="fonts('down')" title="Font size up" alt="S down" />
     </div></td>
  </tr>
  <tr>
    <td><textarea id="<?php echo $text;?>" name="<?php echo $text;?>" style="width:400px;height:250px;font-size:12px;"><?php echo $content;?></textarea></td>
    <td align="center" valign="top">
   <table width="0" cellpadding="2" border="1" class="em_holder" cellspacing="2">
   <tr>
      <td align="center"><a href="javascript:em(':)');"><img border="0" src="./style/base/tpl/images/smilies/smile.svg" /></a></td>
      <td align="center"><a href="javascript:em(':D');"><img border="0" src="./style/base/tpl/images/smilies/smilegrin.svg" /></a></td>
      <td align="center"><a href="javascript:em(':angel:');"><img border="0" src="./style/base/tpl/images/smilies/angel.svg" /></a></td>
      <td align="center"><a href="javascript:em(':angry:');"><img border="0" src="./style/base/tpl/images/smilies/angry.svg" /></a></td>
    </tr>
    <tr>
      <td align="center"><a href="javascript:em(':confused:');"><img border="0" src="./style/base/tpl/images/smilies/confused.svg" /></a></td>
      <td align="center"><a href="javascript:em(':crying:');"><img border="0" src="./style/base/tpl/images/smilies/crying.svg" /></a></td>
      <td align="center"><a href="javascript:em(':hugleft:');"><img border="0" src="./style/base/tpl/images/smilies/hugleft.svg" /></a></td>
      <td align="center"><a href="javascript:em(':clown:');"><img border="0" src="./style/base/tpl/images/smilies/clown.svg" /></a></td>
    </tr>
    <tr>
      <td align="center"><a href="javascript:em(':cool:');"><img border="0" src="./style/base/tpl/images/smilies/cool.svg" /></a></td>
      <td align="center"><a href="javascript:em(':devilish:');"><img border="0" src="./style/base/tpl/images/smilies/devilish.svg" /></a></td>
      <td align="center"><a href="javascript:em(':embarrassed:');"><img border="0" src="./style/base/tpl/images/smilies/embarrassed.svg" /></a></td>
      <td align="center"><a href="javascript:em(':glasses:');"><img border="0" src="./style/base/tpl/images/smilies/glasses.svg" /></a></td>
    </tr>
    <tr>
      <td align="center"><a href="javascript:em(':hugright:');"><img border="0" src="./style/base/tpl/images/smilies/hugright.svg" /></a></td>
      <td align="center"><a href="javascript:em(':kiss:');"><img border="0" src="./style/base/tpl/images/smilies/kiss.svg" /></a></td>
      <td align="center"><a href="javascript:em(':lol:');"><img border="0" src="./style/base/tpl/images/smilies/laughing.svg" /></a></td>
      <td align="center"><a href="javascript:em(':love:');"><img border="0" src="./style/base/tpl/images/smilies/love.svg" /></a></td>
    </tr>
    <tr>
      <td align="center"><a href="javascript:em(':martini:');"><img border="0" src="./style/base/tpl/images/smilies/martini.svg" /></a></td>
      <td align="center"><a href="javascript:em(':ninja:');"><img border="0" src="./style/base/tpl/images/smilies/ninja.svg" /></a></td>
      <td align="center"><a href="javascript:em(':pirate:');"><img border="0" src="./style/base/tpl/images/smilies/pirate.svg" /></a></td>
      <td align="center"><a href="javascript:em(':plain:');"><img border="0" src="./style/base/tpl/images/smilies/plain.svg" /></a></td>
    </tr>
    <tr>
      <td align="center"><a href="javascript:em(':quiet:');"><img border="0" src="./style/base/tpl/images/smilies/quiet.svg" /></a></td>
      <td align="center"><a href="javascript:em(':raspberry:');"><img border="0" src="./style/base/tpl/images/smilies/raspberry.svg" /></a></td>
      <td align="center"><a href="javascript:em(':sad:');"><img border="0" src="./style/base/tpl/images/smilies/sad.svg" /></a></td>
      <td align="center"><a href="javascript:em(':sick:');"><img border="0" src="./style/base/tpl/images/smilies/sick.svg" /></a></td>
    </tr>
    <tr>
      <td align="center"><a href="javascript:em(':sleeping:');"><img border="0" src="./style/base/tpl/images/smilies/sleeping.svg" /></a></td>
      <td align="center"><a href="javascript:em(':smilebig:');"><img border="0" src="./style/base/tpl/images/smilies/smilebig.svg" /></a></td>
      <td align="center"><a href="javascript:em(':smirk:');"><img border="0" src="./style/base/tpl/images/smilies/smirk.svg" /></a></td>
      <td align="center"><a href="javascript:em(':surprise:');"><img border="0" src="./style/base/tpl/images/smilies/surprise.svg" /></a></td>
    </tr>
	</table>
	</td>
  </tr>
</table>
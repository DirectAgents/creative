
<html><title>HTMl5 Drag And Drop Multiple Files Using PHP And Ajax</title>
<a href="http://mistonline.in/wp/drag-and-drop-files-using-php-jquery-ajax/" target=_blank>Go Back To Script</a><p>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>                                                                              
<script type="text/javascript">
if (window.FormData === undefined) {
    alert("HTML5 Not Supported, Please Use Regular Uploading Method");
    }
    $(function () {
 
        var $box = $("#ulbox");
        $box.bind("dragenter", dragEnter);
 
        $box.bind("dragover", dragLeave);
        $box.bind("drop", drop);
 
        function dragEnter(evt) {
            evt.stopPropagation();
            evt.preventDefault();
            console.log("dragEnter...");
            $(evt.target).addClass('over');
            return false;
        }
        function dragLeave(evt) {
            evt.stopPropagation();
            evt.preventDefault();
            console.log("drag leave...");
            $(this).css('background-color', 'white');
            $(evt.target).removeClass('over');
            return false;
        }
 
 
        function drop(evt) {
            evt.stopPropagation();
            evt.preventDefault();
            $(evt.target).removeClass('over');
 
            var files = evt.originalEvent.dataTransfer.files;
 
document.getElementById('ulbox').innerHTML = 'Files Uploaded '+files.length;
 var uploadFormData = new FormData($("#uploadformid")[1]);
    if(files.length > 0) { // checks if any files were dropped
        for(f = 0; f < files.length; f++) { // for-loop for each file dropped
            uploadFormData.append("files[]",files[f]);  // adding every file to the form so you could upload multiple files
        }
    }
                    $.ajax({
                        type: "POST",
                        url: "uploadphoto.php",
                        //paramname: 'Filedata',
                        contentType: false,
                        processData: false,
                        data: uploadFormData,
                        success:function(ret)
        {
            document.getElementById('result').innerHTML = ret;
        },
                    });
                }
 
 
         });
    </script>
<div name="ulbox" id="ulbox" style="border: 5px dashed black; width: 800px; height: 200px;font-family: Times New Roman, Times, serif;color:#D3D3D3;font-size:70px;text-align:center">Drag & Drop Files Here
 </div><form enctype="multipart/form-data" id="uploadformid" method="post" action="uploadphoto.php">
<input type="file" name="files[]" multiple="multiple">
<input type="submit" value="submit">
</form>
<div id="result"></div>


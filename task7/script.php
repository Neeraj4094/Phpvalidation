
<?php
function show_data_btn($data) { ?>
    <script>
        document.getElementById('<?php echo 'showBookBtn_' . $data ?>').addEventListener('click', function() {
        var box = document.getElementById('<?php echo 'bookData_' . $data ?>');
        box.style.display = (box.style.display === 'none' || box.style.display === '') ? 'block' : 'none';
    });
   
    </script>
<?php } ?>

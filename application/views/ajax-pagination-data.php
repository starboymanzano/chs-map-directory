<?php if(!empty($establishment)): foreach($establishment as $establishments): ?>
 	<div class="list-item">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="javascript:void(0);"><?php echo $establishments['EstName']; ?></a></li>
        </ul>
    </div>
<?php endforeach; else: ?>
<p>Establishment(s) not found.</p>
<?php endif; ?>
<?php echo $this->ajax_pagination->create_links(); ?>
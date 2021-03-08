<section class="m-2">
    <h5>آیا از حذف این صفحه مطمئن هستید؟</h5>
    <dl class="dl-horizontal">
        <dt>عنوان گروه:</dt>
        <dd><?php echo $joinPage['title'][1]; ?></dd>
        <dt>عنوان صفحه:</dt>
        <dd><?php echo $joinPage['title'][0]; ?></dd>
        <dt>بازدید:</dt>
        <dd><?php echo $joinPage['visit']; ?></dd>
        <dt>تصویر:</dt>
        <dd>
            <img src="<?php asset($joinPage['image']); ?>" alt="">
        </dd>
        <dt>اسلایدر:</dt>
        <dd>
            <i class="text-primary <?php echo $joinPage['slider']? 'fas fa-check-square' : 'fas fa-square' ?>"></i>
        </dd>
        <dt>تاریخ ایجاد:</dt>
        <dd><?php echo $joinPage['created_at'][0]; ?></dd>
    </dl>
</section>
<div class="d-flex justify-content-end mt-2">
    <a href="<?php url('page/destroy/'.$id); ?>" class="btn btn-danger">حذف گروه</a>
</div>

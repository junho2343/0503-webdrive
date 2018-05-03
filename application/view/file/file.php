<div class="container">
    <div class="form_wrap">
    <form action="" enctype="multipart/form-data" method="post" class="file">
        <input type="hidden" name="action" value="upload">
        <label for="upload">파일 업로드</label>
        <input type="file" id="upload" name="file">
        <input type="submit" value="파일 업로드">
    </form>
    <form action="" class="form" method="post">
        <input type="hidden" name="action" value="folder">
        <input type="text" placeholder="폴더이름" name="name" required>
        <input type="submit" value="폴더생성">
    </form>
</div>
<div class="file_wrap">
 <?php if($this->path != 0): ?>
        <div class="frow">
        <img src="/public/img/folder.png" alt="folder" data-link="/file/file?path=<?=$this->parents->parents?>">
        <p>..</p>
        <ul class="information">
            
        </ul>
    </div>
<?php endif ?>

<?php foreach($this->dirs as $data => $val): ?>
     <div class="frow">
        <img src="/public/img/folder.png" alt="folder" data-link="/file/file?path=<?=$val->idx?>">
        <p><?=$val->name?></p>
        <ul class="information">
            <li><strong>크기</strong> : <?=$val->size?>MB</li>
            <li><strong>생성일</strong> : <?=$val->date?></li>
           <a href="/file/delete?idx=<?=$val->idx?>"><button class="function">삭제</button></a>
        </ul>
    </div>
<?php endforeach; ?>

<?php foreach($this->files as $data => $val): ?>
    <div class="frow">
        <img src="/public/img/file.png" alt="file" data-link="/down/file?idx=<?=$val->idx?>">
        <p><?=$val->name?></p>
        <ul class="information">
            <li><strong>크기</strong> : <?=$val->size?>MB</li>
            <li><strong>생성일</strong> : <?=$val->date?></li>
            <a href="/file/delete?idx=<?=$val->idx?>"><button class="function">삭제</button></a>
        </ul>
    </div>
<?php endforeach; ?>



</div>

</div>
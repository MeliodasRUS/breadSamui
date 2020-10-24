<?php
    require_once('header.php');
    foreach($_COOKIE['SMS'] as $SMS){
        //echo $SMS;
    }
?>

<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Отправка сообщения на email</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
<div class="form-group">
   <label for="name">Тема сообщения:</label>
   <input type="text" name="phone1" id="phone1" class="form-control"   placeholder="Введите тему" required>
</div>
<div class="form-group">
   <label for="email">Текст сообщения:</label>
   <textarea  name="text" class="form-control"  placeholder="Введите текст" required></textarea>
</div>


      </div>
      <div class="modal-footer">
            <button type="submit" name="SMS" class="btn btn-info">Отправить</button>
        </form>
      </div>
    </div>
  </div>   
<?php
    require_once 'footer.php';
?> 
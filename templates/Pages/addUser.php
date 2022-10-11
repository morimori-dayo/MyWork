<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php echo $this->Html->css("addUser"); ?>
</head>
<body>

  <h1>社員登録</h1>

  <form class="was-validated">

    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">社員ID</span>
      <input type="text" id="validationTextarea" class="form-control" placeholder="社員ID" aria-label="社員ID" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text">姓</span>
      <input type="text" class="form-control" placeholder="姓" aria-label="姓" required>
      <span class="input-group-text">名</span>
      <input type="text" class="form-control" placeholder="名" aria-label="名" required>
    </div>

    <div class="input-group mb-3">
      <span class="input-group-text">セイ</span>
      <input type="text" class="form-control" placeholder="セイ" aria-label="セイ" required pattern="[\u30A1-\u30F6]*">
      <span class="input-group-text">メイ</span>
      <input type="text" class="form-control" placeholder="メイ" aria-label="メイ" required pattern="[\u30A1-\u30F6]*">
    </div>

    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">電話番号</span>
      <input type="text" id="validationTextarea" class="form-control" placeholder="電話番号" aria-label="電話番号" aria-describedby="basic-addon1" required pattern="\d{2,4}-?\d{2,4}-?\d{3,4}">
    </div>

    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">メールアドレス</span>
      <input type="email" id="validationTextarea" class="form-control" placeholder="メールアドレス" aria-label="メールアドレス" aria-describedby="basic-addon1" required>
    </div>

    <h2>性別</h2>

    <div class="form-check-group">
      <div class="form-check">
        <input type="radio" class="form-check-input" name="radio-stacked" required>
        <label for="validationFormCheck2" class="form-check-label">男性</label>
      </div>
      <div class="form-check mb-3 woman-radioButton">
        <input type="radio" class="form-check-input" id="validationFormCheck3" name="radio-stacked" required>
        <label for="validationFormCheck3" class="form-check-label">女性</label>
      </div>
    </div>

    
    <h2>生年月日</h2>
    <div class="input-group birth-select mb-3">
      <select class="form-select" id="inputGroupSelect01" required aria-label="年">
          <option value=""></option>
          <option value="1">2000</option>
          <option value="2">2000</option>
          <option value="3">2000</option>
        </select>
      <label class="input-group-text" for="inputGroupSelect01">年</label>
      <select class="form-select" required aria-label="月">
          <option value=""></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      <label class="input-group-text" for="inputGroupSelect01">月</label>
        <select class="form-select" required aria-label="日">
          <option value=""></option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      <label class="input-group-text" for="inputGroupSelect01">日</label>
    </div>

    
    <h2>住所</h2>
    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">郵便番号</span>
      <input type="text" id="validationTextarea" class="form-control" placeholder="xxx-xxxx" aria-label="郵便番号" aria-describedby="basic-addon1" required  pattern="\d{3}-?\d{4}">
    </div>

    <div class="input-group mb-3">
      <label class="input-group-text" for="inputGroupSelect01">都道府県</label>
      <select class="form-select" id="inputGroupSelect01" required aria-label="都道府県">
        <option value=""></option>
        <option value="1">東京</option>
        <option value="2">愛知</option>
        <option value="3">大阪</option>
      </select>
    </div>

    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">市区町村</span>
      <input type="text" id="validationTextarea" class="form-control" placeholder="市区町村" aria-label="市区町村" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">番地</span>
      <input type="text" id="validationTextarea" class="form-control" placeholder="○丁目○番地" aria-label="番地" aria-describedby="basic-addon1" required>
    </div>

    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">建物名・部屋番号</span>
      <input type="text" id="validationTextarea" class="form-control" placeholder="建物名・部屋番号" aria-label="建物名・部屋番号" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">パスワード</span>
      <input type="password" id="validationTextarea" class="form-control" placeholder="パスワード" aria-label="パスワード" aria-describedby="basic-addon1" required pattern="(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,}">
    </div>
    
    <div class="input-group mb-3 ">
      <span class="input-group-text" id="basic-addon1">パスワード(確認)</span>
      <input type="password" id="validationTextarea" class="form-control" placeholder="パスワード" aria-describedby="basic-addon1" required pattern="(?=.*?[a-z])(?=.*?[A-Z])(?=.*?\d)[a-zA-Z\d]{8,}">
    </div>

      <div class="form-check">
        <input type="checkbox" class="form-check-input" name="radio-stacked">
        <label for="validationFormCheck2" class="form-check-label">管理者として登録する場合はチェック</label>
      </div>

      <div class="d-grid gap-2">
        <button class="btn btn-primary" type="button">登録</button>
      </div>

  </form>
</body>
</html>
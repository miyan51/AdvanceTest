<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
  <link rel="stylesheet" href="css\reset.css" />
  <link rel="stylesheet" href="css\style.css" />
</head>

<body>

  <header>
    <h3 class="ttl">内容確認</h3>
  </header>

  <form method="POST" action="{{ route('thanks') }}">
    @csrf


    <div class="Form">
      <div class="Form-Item">
        <p class="Form-Item-Label">お名前</p>
        <p class="Confirm-Text">{{ $inputs['name1'] ." ". $inputs['name2']}}</p>
        <input name="name" value="{{ $inputs['name1'] . $inputs['name2']}}" type="hidden">
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label">性別</p>
        <p class="Confirm-Text">
          @if($inputs['gender']==1)男性 @endif
          @if($inputs['gender']==2)女性 @endif
        </p>
        <input name="gender" value="{{ $inputs['gender'] }}" type="hidden">
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label">メールアドレス</p>
        <p class="Confirm-Text">{{ $inputs['email'] }}</p>
        <input name="email" value="{{ $inputs['email'] }}" type="hidden">
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label">郵便番号</p>
        <p class="Confirm-Text">{{ $inputs['zip11'] }}</p>
        <input name="postcode" value="{{ $inputs['zip11'] }}" type="hidden">
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label">住所</p>
        <p class="Confirm-Text">{{ $inputs['addr11'] }}</p>
        <input name="address" value="{{ $inputs['addr11'] }}" type="hidden">
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label">建物名</p>
        <p class="Confirm-Text">{{ $inputs['building_name'] }}</p>
        <input name="building_name" value="{{ $inputs['building_name'] }}" type="hidden">
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label isMsg">ご意見</p>
        <p class="Confirm-Text">{{ $inputs['opinion'] }}</p>
        <input name="opinion" value="{{ $inputs['opinion'] }}" type="hidden">
      </div>
      <input type="submit" class="Form-Btn" value="送信">
    </div>
  </form>
  <button type="submit" class="Fix-Btn" onClick="history.back()">修正する</button>



</body>

</html>
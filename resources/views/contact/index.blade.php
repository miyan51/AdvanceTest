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
    <h3 class="ttl">お問い合わせ</h3>
  </header>

  <form method="POST" action=" {{ route('confirm') }}">
    @csrf
    <main>

      <div class="Form">
        <div class="Form-Item">
          <p class="Form-Item-Label">お名前<span class="red">※</span></p>
          <input type="text" class="Form-Item-Input" name="name1" value="{{ old('name1') }}">
          <input type="text" class="Form-Item-Input" id="name" name="name2" value="{{ old('name2') }}">
          <div class="Form-Exa">
            <p class="Form-Exa-Text">例)山田　 例)太郎</p>
          </div>
        </div>
        @error('name1')<p class="error">{{ $message }}</p>@enderror
        @error('name2')<p class="error">{{ $message }}</p>@enderror

        <div class="Form-Item">
          <p class="Form-Item-Label">性別<span class="red">※</span></p>
          <input class="Radio-Input" type="radio" name="gender" value="1" checked>男性
          <input class="Radio-Input" type="radio" name="gender" value="2" @if(old('gender')==2)checked @endif>女性
        </div>

        <div class="Form-Item">
          <p class="Form-Item-Label">メールアドレス<span class="red">※</span></p>
          <input type="email" class="Form-Item-Input" name="email" value="{{ old('email') }}">
          <div class="Form-Exa">
            <p class="Form-Exa-Text">例)test@example.com</p>
          </div>
        </div>
        @error('email')<p class="error">{{ $message }}</p>@enderror

        <script src="https://ajaxzip3.github.io/ajaxzip3.js"></script>
        <div class="Form-Item">
          <p class="Form-Item-Label">郵便番号<span class="red">※</span></p>
          <p class="mark">〒</p><input type="text" class="Form-Item-Input" name="zip11" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');">
          <div class="Form-Exa">
            <p class="Form-Exa-Text">例)123-4567</p>
          </div>
        </div>
        @error('zip11')<p class="error">{{ $message }}</p>@enderror

        <div class="Form-Item">
          <p class="Form-Item-Label">住所<span class="red">※</span></p>
          <input type="text" class="Form-Item-Input" name="addr11" value="{{ old('addr11') }}">
          <div class="Form-Exa">
            <p class="Form-Exa-Text">例)東京都渋谷区千駄ヶ谷1-2-3</p>
          </div>
        </div>
        @error('addr11')<p class="error">{{ $message }}</p>@enderror

        <div class="Form-Item">
          <p class="Form-Item-Label">建物名</p>
          <input type="text" class="Form-Item-Input" name="building_name" value="{{ old('building_name') }}">
          <div class="Form-Exa">
            <p class="Form-Exa-Text">例)千駄ヶ谷マンション101</p>
          </div>
        </div>

        <div class="Form-Item">
          <p class="Form-Item-Label isMsg">ご意見<span class="red">※</span></p>
          <textarea class="Form-Item-Textarea" name="opinion">{{ old('opinion') }}</textarea>
        </div>
        @error('opinion')<p class="error">{{ $message }}</p>@enderror
        <input type="submit" class="Form-Btn" value="確認">
      </div>


    </main>
  </form>
</body>

</html>
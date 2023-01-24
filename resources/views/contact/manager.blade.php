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
    <h3 class="ttl">管理システム</h3>
  </header>




  <main class="Manager">
    <form action="/manager" class="Form-Manager" method="GET">
      @csrf
      <div class="Manager-Item-Top">
        <div class="Form-Item">
          <p class="Form-Item-Label-Search">お名前</p>
          <input type="text" class="Form-Item-Input" name="name">
        </div>

        <div class="Form-Item" id="Find-Gender">
          <p class="Form-Item-Label-Search">性別</p>
          <input class="Radio-Input" type="radio" name="gender" checked>全て
          <input class="Radio-Input" type="radio" name="gender" value="1">男性
          <input class="Radio-Input" type="radio" name="gender" value="2">女性
        </div>
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label-Search">登録日</p>
        <input type="date" class="Form-Item-Input" name="before">
        ～<input type="date" class="Form-Item-Input" id="name" name="after">
      </div>

      <div class="Form-Item">
        <p class="Form-Item-Label-Search">メールアドレス</p>
        <input name="email" type="text" class="Form-Item-Input" value="">
      </div>



      <input type="submit" class="Form-Btn" value="送信">
      <a href="{{ route('manager') }}" class="Fix-Btn" id="back">リセット</a>
    </form>


    <div class="Page">
      {{ $datas->total() }}件中
      {{ $datas->firstItem() }}〜{{ $datas->lastItem() }} 件を表示
      <div>
        {{ $datas->appends(request()->input())->render('vendor.pagination.custom') }}
      </div>
    </div>

    <div>
      <table>
        <tr class="List-ttl">
          <th class="List-Id">ID</th>
          <th class="List-Name">お名前</th>
          <th class="List-Gender">性別</th>
          <th class="List-Email">メールアドレス</th>
          <th class="List-Opinion">ご意見</th>
          <th> </th>
        </tr>

        @foreach ($datas as $data)
        <tr class="List-Con">
          <th class="List-Con">{{ $data->id }}</th>
          <th class="List-Con">{{ $data->fullname }}</th>
          <th class="List-Con">@if($data->gender == 1)男性 @endif @if($data->gender == 2)女性 @endif</th>
          <th class="List-Con">{{ $data->email }}</th>
          <th class="List-Con" title="{{ $data->opinion }}"><?php echo mb_strimwidth($data->opinion, 0, 50, '…', 'UTF-8'); ?></th>
          <th>
            <form action="/delete/{{ $data->id }}" method="post">
              @csrf
              <button class="button-delete">削除</button>
            </form>
        </tr>

        @endforeach
      </table>
    </div>
  </main>

</html>
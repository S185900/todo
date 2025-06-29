@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="todo__alert">

  <p class="todo__alert--success">
    Todoを作成しました
  </p>
  @if(session('message'))
    <div class="todo__alert--success">
      <!-- Todoを作成しました -->
      {{ session('message') }}
    </div>
  @endif

  <p class="todo__alert--danger">
    Todoを作成してください
  </p>
  @if ($errors->any())
    <div class="todo__alert--danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
      </div>
  @endif

</div>


<div class="todo__content">

  <div class="form__content">
    <div class="section__title">
      <h2 class="section__title-text">新規作成</h2>
    </div>
    <div class="form__content-1">
      <form class="update-form" action="/todos" method="POST">
          @csrf
          <div class="create-form__item">
            <input class="create-form__item-input" type="text" name="content" placeholder="">
          </div>
      </form>
      <select class="category-select">
        <option value="" disabled selected>カテゴリ</option>
        <option value="Category1">Category1</option>
        <option value="Category2">Category2</option>
        <option value="Category3">Category3</option>
      </select>
      <div class="create-form__button">
        <button class="create-form__button-submit" type="submit">作成</button>
      </div>
    </div>

    <div class="section__title">
      <h2 class="section__title-text">Todo検索</h2>
    </div>
    <div class="form__content-2">
      <form class="select-form" action="/todos" method="POST">
        @csrf
        <div class="select-form__item">
          <input class="select-form__item-input" type="text" name="content" placeholder="">
        </div>
      </form>
      <select class="category-select">
        <option value="" disabled selected>カテゴリ</option>
        <option value="Category1">Category1</option>
        <option value="Category2">Category2</option>
        <option value="Category3">Category3</option>
      </select>
      <div class="select-form__button">
        <button class="select-form__button-submit" type="submit">検索</button>
      </div>
    </div>

  </div>

  <div class="todo-table">
    <table class="todo-table__inner">
      <tr class="todo-table__row">
        <th class="todo-table__header">Todo</th>
      </tr>

      @foreach ($todos as $todo)
      <tr class="todo-table__row">
          <td class="todo-table__item">

            <!-- <form class="update-form"> -->
            <form class="update-form" action="/todos/update" method="POST">
            @method('PATCH')
            @csrf
              <div class="update-form__item">
                <!-- <input class="update-form__item-input" type="text" name="content" value="test"> -->
                <!-- <p class="update-form__item-input">{{ $todo['content'] }}</p> -->
                <input class="update-form__item-input" type="text" name="content" value="{{ $todo['content'] }}">
                <input type="hidden" name="id" value="{{ $todo['id'] }}">
              </div>

                  <div class="update-form__button">
                      <button class="update-form__button-submit" type="submit">更新</button>
                  </div>

              </form>
          </td>
        
          <td class="todo-table__item">
            <!-- <form class="delete-form"> -->
            <form class="delete-form" action="/todos/delete" method="POST">
              @method('DELETE')
              @csrf
              <div class="delete-form__button">
                <input type="hidden" name="id" value="{{ $todo['id'] }}">
                <button class="delete-form__button-submit" type="submit">削除</button>
              </div>
            </form>
          </td>

      </tr>
      @endforeach

        <!-- <tr class="todo-table__row">
          <td class="todo-table__item">
            <form class="update-form">
              <div class="update-form__item">
                <input class="update-form__item-input" type="text" name="content" value="test2">
              </div>
              <div class="update-form__button">
                <button class="update-form__button-submit" type="submit">更新</button>
              </div>
            </form>
          </td>
        <td class="todo-table__item">
          <form class="delete-form">
            <div class="delete-form__button">
              <button class="delete-form__button-submit" type="submit">削除</button>
            </div>
          </form>
        </td>
      </tr> --> 

    </table>
  </div>
</div>
@endsection

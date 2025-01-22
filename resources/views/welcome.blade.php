@extends('layouts.master')


@section('title', 'الرئيسية')

@section('page_title', 'لوحة التحكم')


@section('content')
@if (Auth::user()->is_admin)

<section class="content">
    <div class="container-fluid  ">
      <!-- Small boxes (Stat box) -->
      <div class="row ">
        <div class="col-lg-4 col-6 ">
          <!-- small box -->
          <div class="small-box bg-primary">
            <div class="inner">
            @php
                $totalSales = 0;
                $totalExpenses = 0;
            @endphp
            @foreach ($sales as $sale)
                @php $totalSales += $sale->price  @endphp
            @endforeach
              <h3>{{$totalSales}}</h3>

              <p>اجمالي المبيعات</p>
            </div>
            <div class="icon">
                <i class="fa-solid fa-shop"></i>
            </div>
            <a href="{{route('sales.index')}}" class="small-box-footer">-</a>
        </div>
        </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                @foreach ($expenses as $expense)
                @php $totalExpenses += $expense->price  @endphp
                @endforeach
              <h3>{{$totalExpenses}}</h3>

                <p>اجمالي المصاريف</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-money-bill"></i>
            </div>
              <a href="{{route('expenses.index')}}" class="small-box-footer">-</a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                @php
                    $profits = $totalSales - $totalExpenses
                @endphp
                <h3>{{$profits ?? 0}}</h3>
                <p>صافي الربح</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">-</a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($services) ?? 0}}</h3>

                <p>عدد الخدمات</p>
              </div>
              <div class="icon">
                <i class="fa-brands fa-servicestack"></i>
              </div>
              <a href="{{route('services.index')}}" class="small-box-footer">-</a>
            </div>
          </div>

          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>{{count($users ?? 0)}}</h3>

                <p>عدد المستخدمين</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-user"></i>
              </div>
              <a href="{{route('auth.index')}}" class="small-box-footer">-</a>
            </div>
          </div>

        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{count($sellers ?? 0)}}</h3>

                <p>عدد الحلاقين</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-scissors"></i>
              </div>
              <a href="{{route('sellers.index')}}" class="small-box-footer">-</a>
            </div>
          </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->

      <!-- /.row (main row) -->

  </section>
  @endif

@endsection


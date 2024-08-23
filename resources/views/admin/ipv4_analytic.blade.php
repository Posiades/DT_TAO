@extends('admin/layout')
@section('title', 'IPv4 Analytic')
@section('content')

<div class="container mt-5">
    <section class="is-title-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <ul>
                <li>Admin</li>
                <li>IPv4 Analytic</li>
            </ul>
        </div>
    </section>

    <section class="is-hero-bar">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
            <h1 class="title">
                Phân Tích Vị Trí Người Dùng
            </h1>
        </div>
    </section>

    <section class="section main-section">
        <div class="card has-table">
            <header class="card-header">
                <p class="card-header-title">
                    <span class="icon"><i class="mdi mdi-map"></i></span>
                    Phân Tích Vị Trí Người Dùng Trong @if ($time == 24)
                        24 Giờ Vừa Qua
                    @elseif ($time == 30)
                        30 Ngày Vừa Qua
                    @else
                        30 Ngày Vừa Qua
                    @endif
                </p>

                <!-- Dropdown Filter -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Lọc Thời Gian
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('ipv4_filter', ['time' => 24]) }}">24 Giờ Qua</a></li>
                        <li><a class="dropdown-item" href="{{ route('ipv4_filter', ['time' => 30]) }}">30 Ngày Qua</a></li>
                    </ul>
                </div>
            </header>
            <div class="card-content">
                @if($location->isEmpty())
                    <p>Không có dữ liệu cho khoảng thời gian này.</p>
                @else
                    <table>
                        <thead>
                            <tr>
                                <th>Vị Trí Người Dùng</th>
                                <th>Số Lần Truy Cập</th>
                                <th>Chiếm / Tổng</th>
                                <th>Chiếm Phần Trăm %</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($location as $item)
                            <tr>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->count }}</td>
                                <td>{{ $item->count }}/{{$total}}</td>
                                <td>{{ number_format(($item->count / $total) * 100, 2) }} %</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </section>
</div>

@endsection

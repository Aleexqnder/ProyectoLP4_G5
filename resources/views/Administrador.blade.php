@extends('adminlte::page')

@section('title', 'Administrador')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Bienvenido al Panel de Administrador</h1>
        <img src="{{ asset('build/assets/img/LogoPNG.png') }}" alt="Logo" class="logo-clase" style="height: 350px;">
    </div>
@stop

@section('content')
    <div class="row">
        <!-- Gráfica de Ventas -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gráfico de Ventas</h3>
                </div>
                <div class="card-body">
                    <canvas id="ventasChart" style="height:250px; min-height:250px"></canvas>
                </div>
            </div>
        </div>
        <!-- Calendario -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Calendario de Eventos</h3>
                </div>
                <div class="card-body">
                    <div id="calendario"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Widgets Adicionales -->
    <div class="row mt-4">
        <!-- Widget 1: Usuarios Registrados -->
        <div class="col-md-3">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>150</h3>
                    <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Widget 2: Ventas Totales -->
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>$53,000</h3>
                    <p>Ventas Totales</p>
                </div>
                <div class="icon">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Widget 3: Nuevos Pedidos -->
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>
                    <p>Nuevos Pedidos</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Widget 4: Comentarios -->
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>65</h3>
                    <p>Comentarios</p>
                </div>
                <div class="icon">
                    <i class="fas fa-comments"></i>
                </div>
                <a href="#" class="small-box-footer">
                    Más info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Gráfica de Rendimiento -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Gráfico de Rendimiento</h3>
                </div>
                <div class="card-body">
                    <canvas id="rendimientoChart" style="height:250px; min-height:250px"></canvas>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- CSS de FullCalendar -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css">
    <!-- FontAwesome para los íconos de los widgets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@stop

@section('js')
    <!-- JS de Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- JS de FullCalendar -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales/es.js"></script>
    <!-- Script para las Gráficas -->
    <script>
        // Gráfico de Ventas
        var ctxVentas = document.getElementById('ventasChart').getContext('2d');
        var ventasChart = new Chart(ctxVentas, {
            type: 'bar',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Ventas',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: '#00c0ef',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });

        // Gráfico de Rendimiento
        var ctxRendimiento = document.getElementById('rendimientoChart').getContext('2d');
        var rendimientoChart = new Chart(ctxRendimiento, {
            type: 'line',
            data: {
                labels: ['Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    label: 'Rendimiento',
                    data: [30, 25, 35, 40, 20, 45],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: '#ff6384',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
    <!-- Script para el Calendario -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendario');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: [
                    {
                        title: 'Cita de Mantenimiento',
                        start: '2023-10-10',
                        description: 'Revisión general del vehículo.'
                    },
                    {
                        title: 'Entrega de Vehículo',
                        start: '2023-10-15',
                        description: 'Entrega del vehículo al cliente.'
                    },
                    // Agrega más eventos aquí
                ],
                eventClick: function(info) {
                    alert(info.event.title + '\n' + (info.event.extendedProps.description || ''));
                }
            });
            calendar.render();
        });
    </script>
@stop
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Diagnóstico SGC</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .header {
            border-bottom: 2px solid #111;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }
        .header h1 {
            margin: 0;
            font-size: 26px;
            color: #111;
        }
        .header p {
            margin: 5px 0 0 0;
            font-size: 14px;
            color: #666;
        }
        .date {
            float: right;
            text-align: right;
            margin-top: -45px;
        }
        .date strong {
            display: block;
            font-size: 14px;
            color: #111;
        }
        .date span {
            font-size: 12px;
            color: #666;
        }
        .summary {
            background-color: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 15px;
            margin-bottom: 20px;
            text-align: center;
            border-radius: 8px;
        }
        .summary table {
            width: 100%;
        }
        .summary td {
            width: 33.3%;
            vertical-align: top;
        }
        .summary span.label {
            display: block;
            font-size: 11px;
            font-weight: bold;
            color: #64748b;
            text-transform: uppercase;
            margin-bottom: 5px;
        }
        .summary span.value {
            font-size: 18px;
            font-weight: bold;
            color: #0f172a;
        }
        .status-cert {
            color: #15803d !important;
        }
        .recommendation {
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 15px;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            color: #1e3a8a;
            margin-bottom: 30px;
            border-radius: 8px;
        }
        .gauge-container {
            text-align: center;
            margin-bottom: 35px;
        }
        .details {
            width: 100%;
        }
        .details td {
            width: 50%;
            vertical-align: top;
        }
        .list-section h3 {
            font-size: 16px;
            color: #0f172a;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
        .list-item {
            margin-bottom: 8px;
            font-size: 13px;
        }
        .icon {
            font-weight: bold;
            margin-right: 8px;
            font-size: 14px;
        }
        .icon.yes { color: #16a34a; }
        .icon.no { color: #dc2626; }
        .item-text {
            color: #64748b;
        }
        .item-text.yes {
            color: #0f172a;
            font-weight: bold;
        }
        .footer {
            margin-top: 50px;
            border-top: 1px solid #e2e8f0;
            padding-top: 15px;
            text-align: center;
            font-size: 11px;
            color: #94a3b8;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>Reporte de Diagnóstico Inicial SGC</h1>
        <p>Quality & Competitive College (QCC)</p>
        <div class="date">
            <strong>{{ date('d \d\e F \d\e Y') }}</strong>
            <span>{{ date('H:i') }}</span>
        </div>
    </div>

    <div class="summary">
        <table>
            <tr>
                <td>
                    <span class="label">Puntaje</span>
                    <span class="value">{{ $score }} / 12</span>
                </td>
                <td>
                    <span class="label">Nivel</span>
                    <span class="value">{{ $level }}</span>
                </td>
                <td>
                    <span class="label">Estatus</span>
                    <span class="value {{ $status === 'SÍ CERTIFICABLE' ? 'status-cert' : '' }}">{{ $status }}</span>
                </td>
            </tr>
        </table>
    </div>

    <div class="recommendation">
        {{ $recommendation }}
    </div>

    <div class="gauge-container">
        <img src="{{ $gauge_image }}" alt="Gauge" style="width: 340px; height: auto;">
    </div>

    <table class="details">
        <tr>
            <td style="padding-right: 20px;">
                <div class="list-section">
                    <h3>Requisitos SGC</h3>
                    @foreach($questions as $q)
                        <div class="list-item">
                            <span class="icon {{ $q['checked'] ? 'yes' : 'no' }}">{!! $q['checked'] ? '&#10004;' : '&#10006;' !!}</span>
                            <span class="item-text {{ $q['checked'] ? 'yes' : 'no' }}">{{ $q['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </td>
            <td style="padding-left: 20px;">
                <div class="list-section">
                    <h3>Capacitaciones</h3>
                    @foreach($trainings as $t)
                        <div class="list-item">
                            <span class="icon {{ $t['checked'] ? 'yes' : 'no' }}">{!! $t['checked'] ? '&#10004;' : '&#10006;' !!}</span>
                            <span class="item-text {{ $t['checked'] ? 'yes' : 'no' }}">{{ $t['label'] }}</span>
                        </div>
                    @endforeach
                </div>
            </td>
        </tr>
    </table>

    <div class="footer">
        Documento generado automáticamente • Centro de Certificación IA QCC
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Presente</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #424242;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #424242;
            font-size: 28px;
            margin: 0;
        }
        .header .emoji {
            font-size: 48px;
            margin-bottom: 10px;
        }
        .thank-you {
            text-align: center;
            font-size: 20px;
            color: #424242;
            margin: 20px 0;
        }
        .gift-info {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
        }
        .gift-name {
            font-size: 22px;
            color: #000;
            margin: 0 0 10px;
            font-weight: bold;
        }
        .gift-price {
            font-size: 24px;
            color: #424242;
            font-weight: bold;
        }
        .confirmation-box {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 8px;
            padding: 20px;
            margin: 20px 0;
            text-align: center;
        }
        .confirmation-box .icon {
            font-size: 32px;
            margin-bottom: 10px;
        }
        .confirmation-box p {
            color: #155724;
            margin: 0;
            font-weight: bold;
        }
        .details {
            background-color: #e9ecef;
            border-left: 4px solid #424242;
            padding: 15px 20px;
            margin: 20px 0;
        }
        .details p {
            margin: 5px 0;
        }
        .payment-method {
            display: inline-block;
            background-color: #424242;
            color: white;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
            text-transform: uppercase;
        }
        .message {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 8px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 14px;
        }
        .footer .names {
            font-size: 24px;
            color: #424242;
            margin: 10px 0;
            font-family: 'Georgia', serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="emoji">💝</div>
            <h1>Muito Obrigado!</h1>
        </div>
        
        <p class="thank-you">Olá, {{ $buyerName }}!</p>
        
        <div class="confirmation-box">
            <div class="icon">✓</div>
            <p>Seu presente foi confirmado com sucesso!</p>
        </div>
        
        <p>Sua generosidade nos emociona! Cada presente nos ajuda a construir nosso lar e realizar nossos sonhos juntos.</p>
        
        <div class="gift-info">
            <p class="gift-name">{{ $gift->name }}</p>
            <p class="gift-price">{{ $gift->formatted_price }}</p>
            @if($gift->description)
            <p style="color: #6c757d; margin-top: 10px;">{{ $gift->description }}</p>
            @endif
        </div>
        
        <div class="details">
            <p><strong>Comprador:</strong> {{ $buyerName }}</p>
            <p><strong>Data:</strong> {{ now()->format('d/m/Y H:i') }}</p>
            <p><strong>Forma de pagamento:</strong> <span class="payment-method">{{ $paymentMethod === 'pix' ? 'PIX' : 'Cartão de Crédito' }}</span></p>
        </div>
        
        <div class="message">
            <p>💒 Esperamos você no nosso casamento!</p>
            <p><strong>09 de Maio de 2026</strong></p>
        </div>
        
        <p>Sua presença será o maior presente que podemos receber neste dia tão especial das nossas vidas.</p>
        
        <p>Com muito amor e gratidão,</p>
        
        <div class="footer">
            <div class="names">Lailla & Cristhian</div>
            <p style="font-style: italic;">"All love stories are beautiful, but ours is my favorite"</p>
        </div>
    </div>
</body>
</html>


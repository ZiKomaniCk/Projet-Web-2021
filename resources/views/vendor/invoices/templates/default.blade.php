<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>{{ $invoice->name }}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <link rel="stylesheet" href="{{ asset('/vendor/invoices/bootstrap.min.css') }}">
       
        <style type="text/css" media="screen">
            html {
                margin: 0;
                font-size: 28px;
            }
            body {
                font-size: 0.6875rem;
                margin: 50pt;
            }
            body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
                font-family: sans-serif;
                line-height: 1.1;
            }
            .total-amount {
                font-size: 28px;
                font-weight: 700;
            }
        </style>
    </head>

    <body>
        {{-- Header --}}
        <table class="table mt-5">
            <tbody>
                <tr>
                    <td class="border-0 " width="70%">
                        <h1 class="text-uppercase">
                            <strong>{{ $invoice->name }}</strong>
                        </h1>
                    </td>
                    <td class="border-0 pl-0">
                        <p>{{ __('Facture générée le') }} <strong>{{ $invoice->getDate() }}</strong></p>
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Seller - Buyer --}}
        <table class="table">
            <thead>
                <tr>
                    <th class="border-0 pl-0" width="48.5%">
                        <h2>{{ __('Vendeur') }}</h2>
                    </th>
                    <th class="border-0" width="3%"></th>
                    <th class="border-0 pl-0">
                        <h2>{{ __('Acheteur') }}</h2>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-0" style="padding-left: 50px; padding-bottom: 30px;">
                        @if($invoice->seller->name)
                            <p class="seller-name">
                                <strong>{{ $invoice->seller->name }}</strong>
                            </p>
                        @endif

                        @if($invoice->seller->address)
                            <p class="seller-address">
                                {{ __('invoices::invoice.address') }}: {{ $invoice->seller->address }}
                            </p>
                        @endif

                        @if($invoice->seller->code)
                            <p class="seller-code">
                                {{ __('invoices::invoice.code') }}: {{ $invoice->seller->code }}
                            </p>
                        @endif

                        @if($invoice->seller->vat)
                            <p class="seller-vat">
                                {{ __('invoices::invoice.vat') }}: {{ $invoice->seller->vat }}
                            </p>
                        @endif

                        @if($invoice->seller->phone)
                            <p class="seller-phone">
                                {{ __('invoices::invoice.phone') }}: {{ $invoice->seller->phone }}
                            </p>
                        @endif

                        @foreach($invoice->seller->custom_fields as $key => $value)
                            <p class="seller-custom-field">
                                {{ ucfirst($key) }}: {{ $value }}
                            </p>
                        @endforeach
                    </td>
                    <td class="border-0"></td>
                    <td class="px-0" style="padding-left: 50px;">
                        @if($invoice->buyer->name)
                            <p class="buyer-name">
                                <strong>{{ $invoice->buyer->name }}</strong>
                            </p>
                        @endif

                        @if($invoice->buyer->address)
                            <p class="buyer-address">
                                {{ __('invoices::invoice.address') }}: {{ $invoice->buyer->address }}
                            </p>
                        @endif

                        @if($invoice->buyer->code)
                            <p class="buyer-code">
                                {{ __('invoices::invoice.code') }}: {{ $invoice->buyer->code }}
                            </p>
                        @endif

                        @if($invoice->buyer->vat)
                            <p class="buyer-vat">
                                {{ __('invoices::invoice.vat') }}: {{ $invoice->buyer->vat }}
                            </p>
                        @endif

                        @if($invoice->buyer->phone)
                            <p class="buyer-phone">
                                {{ __('invoices::invoice.phone') }}: {{ $invoice->buyer->phone }}
                            </p>
                        @endif

                        @foreach($invoice->buyer->custom_fields as $key => $value)
                            <p class="buyer-custom-field">
                                {{ ucfirst($key) }}: {{ $value }}
                            </p>
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>

        {{-- Table --}}
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="border-0 pl-0">{{ __('Jeux') }}</th>
                    @if($invoice->hasItemUnits)
                        <th scope="col" class="text-center border-0">{{ __('invoices::invoice.units') }}</th>
                    @endif
                    <th scope="col" class="text-center border-0">{{ __('Qt.') }}</th>
                    <th scope="col"  class="text-right border-0">{{ __('Prix') }}</th>
                    @if($invoice->hasItemDiscount)
                        <th scope="col" class="text-right border-0">{{ __('invoices::invoice.discount') }}</th>
                    @endif
                    @if($invoice->hasItemTax)
                        <th scope="col" class="text-right border-0">{{ __('invoices::invoice.tax') }}</th>
                    @endif
                    <th scope="col" class="text-right border-0 pr-0" style="padding-left: 30px;">{{ __('Total') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr>
                    <td class="pl-0">{{ $item->title }}</td>
                    @if($invoice->hasItemUnits)
                        <td class="text-center">{{ $item->units }}</td>
                    @endif
                    <td class="text-center" style="padding: 15px;" >{{ $item->quantity }}</td>
                    <td class="text-right" style="padding: 15px;">
                        {{ $invoice->formatCurrency($item->price_per_unit) }}
                    </td>
                    @if($invoice->hasItemDiscount)
                        <td class="text-right">
                            {{ $invoice->formatCurrency($item->discount) }}
                        </td>
                    @endif
                    @if($invoice->hasItemTax)
                        <td class="text-right">
                            {{ $invoice->formatCurrency($item->tax) }}
                        </td>
                    @endif
                    <td class="text-right pr-0" style="padding-left: 50px;">
                        {{ $invoice->formatCurrency($item->sub_total_price) }}
                    </td>
                </tr>
                @endforeach
                {{-- Summary --}}
                @if($invoice->hasItemOrInvoiceDiscount())
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('invoices::invoice.total_discount') }}</td>
                        <td class="text-right pr-0">
                            {{ $invoice->formatCurrency($invoice->total_discount) }}
                        </td>
                    </tr>
                @endif
                {{-- @if($invoice->taxable_amount)
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}"class="border-0"></td>
                        <td class="text-right pl-0" >{{ __('Total') }}</td>
                        <td class="text-right pr-0" style="padding: 15px; padding-left: 50px;">
                            {{ $invoice->formatCurrency($invoice->taxable_amount) }}
                        </td>
                    </tr>
                @endif --}}
                @if($invoice->tax_rate)
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('Taxe') }}</td>
                        <td class="text-right pr-0" style="padding: 15px; padding-left: 50px;">
                            {{ $invoice->tax_rate }}%
                        </td>
                    </tr>
                @endif
                @if($invoice->hasItemOrInvoiceTax())
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('Taxe totale') }}</td>
                        <td class="text-right pr-0" style="padding: 15px; padding-left: 50px;">
                            {{ $invoice->formatCurrency($invoice->total_taxes) }}
                        </td>
                    </tr>
                @endif
                    <tr>
                        <td colspan="{{ $invoice->table_columns - 2 }}" class="border-0"></td>
                        <td class="text-right pl-0">{{ __('Montant final') }}</td>
                        <td class="text-right pr-0 total-amount" style="padding: 15px; padding-left: 30px;">
                            {{ $invoice->formatCurrency($invoice->total_amount) }}
                        </td>
                    </tr>
            </tbody>
        </table>

        <p>
            {{ trans('Prix en toutes lettres') }}: {{ $invoice->getTotalAmountInWords() }}
        </p>
        
        <script type="text/php">
            if (isset($pdf) && $PAGE_COUNT > 1) {
                $text = "Page {PAGE_NUM} / {PAGE_COUNT}";
                $size = 10;
                $font = $fontMetrics->getFont("Verdana");
                $width = $fontMetrics->get_text_width($text, $font, $size) / 2;
                $x = ($pdf->get_width() - $width);
                $y = $pdf->get_height() - 35;
                $pdf->page_text($x, $y, $text, $font, $size);
            }

        </script>
    </body>
</html>

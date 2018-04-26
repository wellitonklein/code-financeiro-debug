<?php

use CodeFin\Models\Bank;
use CodeFin\Repositories\BankRepository;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Storage;

class CreateBanksData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var \CodeFin\Repositories\BankRepository $repository */
        $repository = app(BankRepository::class);
        foreach ($this->getData() as $bankArray){
            $repository->create($bankArray);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** @var BankRepository $repository */
        $repository = app(\CodeFin\Repositories\BankRepositoryEloquent::class);
        $repository->skipPresenter(true);
        $count = count($this->getData());
        foreach (range(1,$count) as $id) {
            $bank = $repository->find($id);
            $path = Bank::LOGOS_DIR . '/' . $bank->logo;
            Storage::disk('public')->delete($path);
            echo "** Imagem do '$bank->name' deletada: " . $bank->logo . "\n";
            $bank->delete();
        }
    }

    public function getData(){
        return [
            [
                'name' => 'Caixa',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/caixa.jpeg'),
                    'caixa.jpeg'
                )
            ],
            [
                'name' => 'Banco do Brasil',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/banco-do-brasil.jpeg'),
                    'banco-do-brasil.jpeg'
                )
            ],
            [
                'name' => 'Bradesco',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/bradesco.jpeg'),
                    'bradesco.jpeg'
                )
            ],
            [
                'name' => 'Itaú',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/itau.jpeg'),
                    'itau.jpeg'
                )
            ],
            [
                'name' => 'Sicoob',
                'logo' => new \Illuminate\Http\UploadedFile(
                    storage_path('app/files/banks/logos/sicoob.jpeg'),
                    'sicoob.jpeg'
                )
            ]
        ];
    }
}

<?php
namespace Pers0n4\XePlugin\Message;

use Route;
use Schema;
use App\Facades\XeLang;
use Illuminate\Database\Schema\Blueprint;
use Xpressengine\Plugin\AbstractPlugin;
use Pers0n4\XePlugin\Message\ToggleMenu\ToggleItem;

class Plugin extends AbstractPlugin
{
    /**
     * 이 메소드는 활성화(activate) 된 플러그인이 부트될 때 항상 실행됩니다.
     *
     * @return void
     */
    public function boot()
    {
        app('xe.pluginRegister')->add(ToggleItem::class);

        $this->route();
    }

    protected function route()
    {
        Route::fixed('messages', function () {
            Route::group(['middleware' => 'auth'], function () {
                Route::get('/', [
                    'as' => 'message::index',
                    'uses' => 'Pers0n4\XePlugin\Message\Controller@index',
                ]);

                Route::get('/create', [
                    'as' => 'message::create',
                    'uses' => 'Pers0n4\XePlugin\Message\Controller@create',
                ]);

                Route::post('/', [
                    'as' => 'message::store',
                    'uses' => 'Pers0n4\XePlugin\Message\Controller@store',
                ]);

                Route::get('/show/{id}', [
                    'as' => 'message::show',
                    'uses' => 'Pers0n4\XePlugin\Message\Controller@show',
                ]);
            });
        });
    }

    /**
     * 플러그인이 활성화될 때 실행할 코드를 여기에 작성한다.
     *
     * @param string|null $installedVersion 현재 XpressEngine에 설치된 플러그인의 버전정보
     *
     * @return void
     */
    public function activate($installedVersion = null)
    {
        // implement code
    }

    /**
     * 플러그인을 설치한다. 플러그인이 설치될 때 실행할 코드를 여기에 작성한다
     *
     * @return void
     */
    public function install()
    {
        XeLang::putFromLangDataSource(
            'message',
            base_path('plugins/message/lang/lang.php')
        );

        if (!Schema::hasTable('messages')) {
            Schema::create('messages', function (Blueprint $table) {
                $table->engine = 'InnoDB';

                $table->string('id', 36);
                $table->string('receiver_id', 36)->index();
                $table->string('sender_id', 36)->index();
                $table->text('content');
                $table->boolean('is_read')->default(false);
                $table
                    ->timestamp('created_at')
                    ->nullable()
                    ->index();
                $table
                    ->timestamp('updated_at')
                    ->nullable()
                    ->index();

                $table->primary('id');
            });
        }
    }

    /**
     * 해당 플러그인이 설치된 상태라면 true, 설치되어있지 않다면 false를 반환한다.
     * 이 메소드를 구현하지 않았다면 기본적으로 설치된 상태(true)를 반환한다.
     *
     * @return boolean 플러그인의 설치 유무
     */
    public function checkInstalled()
    {
        // implement code

        return parent::checkInstalled();
    }

    /**
     * 플러그인을 업데이트한다.
     *
     * @return void
     */
    public function update()
    {
        // implement code
    }

    /**
     * 해당 플러그인이 최신 상태로 업데이트가 된 상태라면 true, 업데이트가 필요한 상태라면 false를 반환함.
     * 이 메소드를 구현하지 않았다면 기본적으로 최신업데이트 상태임(true)을 반환함.
     *
     * @return boolean 플러그인의 설치 유무,
     */
    public function checkUpdated()
    {
        // implement code

        return parent::checkUpdated();
    }
}

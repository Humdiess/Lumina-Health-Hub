    <?php

    use App\Http\Controllers\LuminaController;
    use App\Http\Controllers\ProfileController;
    use App\Http\Controllers\ProductController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\CheckoutController;
    use App\Http\Controllers\DietController;
    use App\Http\Controllers\BMIController;
    use App\Http\Controllers\BmiCheckController;

    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    // Route::get('/', function () {
    //     return view('lumina.index');
    // });
    Route::get('/', [luminaController::class, 'index'])->name('lumina.index');



    // Route::get('/', [ProductController::class, 'index'])->name('shop');

    Route::get('/dashboard', function () {
        return view('lumina.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/services', function () {
        return view('lumina.services');
    })->middleware(['auth', 'verified'])->name('services');

    Route::get('/about', function () {
        return view('lumina.services');
    })->middleware(['auth', 'verified'])->name('about');

    Route::get('/contact', function () {
        return view('lumina.contact');
    })->middleware(['auth', 'verified'])->name('contact');

    Route::get('/chats', function () {
        return view('lumina.chat');
    });

    Route::get('/product', function() {
        return view('product.create');
    });

    Route::get('/diet' , function() {
        return view('lumina.diet');
    });

    Route::get('/diet', [DietController::class, 'index']);
    Route::get('/product/diet', [DietController::class, 'create']);
    Route::post('/diet', [DietController::class, 'store']);

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::resource('product', ProductController::class);
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::view('product/create', 'product.create');
    });

    // route untuk checkkout
    // routes/web.php

    Route::get('/', [CheckoutController::class, 'index'])->name('lumina.index');
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('/bmi-checkout', [BmiCheckController::class, 'checkout'])->name('bmi-checkout');


    Route::post('/chat', 'App\Http\Controllers\ChatController');

    Route::get('/show-bmi-form', [BMIController::class, 'showForm'])->name('showForm');
    Route::post('/calculate-bmi', [BMIController::class, 'calculate'])->name('calculateBMI');


    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    require __DIR__.'/auth.php';



    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



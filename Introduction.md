#For DevOps!

# quy tac file name, folder name
* file name: viet hoa chu dau
* folder name: viet chu thuong

# Lenh Create Model
* php artisan make:mode Test
<!-- ket hop tao file controller -->
* php artisan make:mode Test --resource 
<!-- ket hop tao file migration -->
* php artisan make:mode Test -m    or     php artisan make:mode Entities/Test --migration 

# Lenh Controller
* php artisan make:controller Auth/LoginController 
 <!-- tao function index,create,deleet -->
* php artisan make:controller Auth/LoginController --resource 

## Leng Request 
* php artisan make:request classname -> 
php artisan make:request CreateTestRequest (se tu tao ra folder Request trong http luono)





# What does Laravel do ?
* Route Handling
* Security Layer
* Model & DB Migrations
* Views/Templates
* Authentication
* Sessions
* Compile Assets
* Storage & File Management
* Error Handling
* Email & Config
* Cache Handling

# Examples of Artisan Commands

> php artisan list

> php artisan help migrate

> php artisan make""controller TodosController

> php artisan make:model Todo -m

> php artisan make:migration add_todos_to_db-table-todos

> php artisan migrate

> php artisan tinker

# Eloquent ORM

Laravel includes the Eloquent object relational mapper
* Make querying & working with DB very easy
* We can still use raw SQL queries if needed
~~~~
Use App\Todo;
$todo = new Todo();
$todo-> title = 'Some Todo';
$todo-> save();
~~~~

# Blade Template Engine

* Simple & Powerful
* Control structures (if else, loops, etc)
* Can use   
~~~~
<?php echo 'PHP Tags'; ?>
~~~~
* Template Inheritance: Extend layouts easily
* Can create custom components



#Validation in Laravel
##Command line:

>php artisan make:request CreateProjectRequest

>php artisan make:request EditProjectRequest

Request directory was created in: 
~~~~
...
|- app/
    |- Console/
    |- Exceptions/
    |- Http/
        |- Controllers/
            |- Auth
        |- Middleware/
        |- Request/
                    CreateProjectRequest.php
                    EditProjectRequest.php
    |- Model/
    |- Rules/
    |- ServiceImpl/
    |- Services/
    |- Providers/
...
~~~~
## Validate coding in custom Request
~~~~
<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'project_code' => 'required|unique:t_project|max:5|min:3|regex:/(^([a-zA-Z0-9]+)?$)/u',
            'project_name' => 'required|unique:t_project|max:255|regex:/(^([a-zA-Z\s.-]+)?$)/u',
            'customer_id' => 'required',
            'start_date' => 'required|max:10|date_format:Y/m/d',
            'end_date' => 'required|max:10|date_format:Y/m/d|after:start_date',
            'resource_type' => 'required|max:60',
            'project_type' => 'required|max:60',
            'project_manager' => 'nullable|max:10|regex:/(^([a-zA-Z\s.-]+)?$)/u',
            'timesheet_due_day' => 'nullable|regex:/(^([a-zA-Z0-9]+)?$)/u|min:1|max:31|digits_between:1,31|integer',
            'invoice_due_day' => 'nullable|regex:/(^([a-zA-Z0-9]+)?$)/u|min:1|max:31|digits_between:1,31|integer',
        ];
    }
}

~~~~
## Using 
In ProjectController.php
~~~~
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProjectService;
use App\Http\Requests\Project\CreateProjectRequest;

class ProjectController extends Controller
{
    private $projectService;

    public function __construct(ProjectService $projectService)
    {
        // Authentication
        $this->middleware('auth');

        $this->projectService = $projectService;
    }

    public function index()
    {
        try {
            return view('project.ProjectList', [
                'customers' =>  Customer::all()
            ]);
        } catch (Exception $ex) {
            return view('errors.500');
        }
    }

    public function add(CreateProjectRequest $request)
    {
        try {

            $users = User::all();
            $customers = Customer::all();
            $accounts = Account::all();
            $projectTypes = config('systemsetting.projectTypes');
            $resourceTypes = config('systemsetting.resourceTypes');

            return view('project.ProjectAdd', [
                'customers' => $customers,
                'users' => $users,
                'accounts' => $accounts,
                'projectTypes' => $projectTypes,
                'resourceTypes' => $resourceTypes
            ]);
        } catch (Exception $ex) {
            return view('errors.500');
        }
    }

}

~~~~
# Mix CSS, JS code

> npm run production

# Package Dependencies
* Datatable
>npm install --save datatables.net-dt
* 


# Localization
* [Document](https://laravel.com/docs/5.8/localization#configuring-the-locale)
~~~~
/resources
    /lang
        /en
            messages.php
        /vi
            messages.php
~~~~
* How to custom message
~~~~
<?php

// resources/lang/en/messages.php

return [
    'welcome' => 'Welcome to our application'
];
~~~~
* How to use it
    ~~~~
        {{ __('messages.welcome') }}
    or
        @lang('messages.welcome')
    ~~~~ 

# Database 

##1. Migrations
- [Document](https://laravel.com/docs/5.8/migrations)

- Create table  
~~~~
php artisan make:migration create_table_customer --create=customer

php artisan make:migration create_table_project --create=project

php artisan make:migration create_table_estimation --create=estimation

php artisan make:migration create_table_effort --create=effort

php artisan make:migration create_table_cost --create=cost

php artisan make:migration create_table_cost_category --create=cost_category

php artisan make:migration create_table_invoice --create=invoice

php artisan make:migration create_table_invoice_detail --create=invoice_detail

php artisan make:migration create_table_rate --create=rate

php artisan make:migration create_table_role --create=role

php artisan make:migration create_table_config --create=config

php artisan make:migration create_table_account --create=account

php artisan make:migration create_table_account_session --create=account_session

php artisan make:migration create_table_banking --create=banking

php artisan make:migration create_table_country --create=country

php artisan make:migration create_table_currency --create=currency

php artisan make:migration create_table_swift_code --create=swift_code

~~~~
* Run migration (all)

> php artisan migrate

* In case: Production 

> php artisan migrate --force

* Roll back

>php artisan migrate:rollback

* Rollback & Migrate In Single Command
~~~~
php artisan migrate:refresh

// Refresh the database and run all database seeds...
php artisan migrate:refresh --seed
~~~~

##2. Seeding
[Documnet](https://laravel.com/docs/5.8/seeding)

Create Table Seeder
~~~~
php artisan make:seeder CountryTableSeeder

php artisan make:seeder CurrencyTableSeeder

php artisan make:seeder SwiftCodeTableSeeder

php artisan make:seeder ProjectTableSeeder

php artisan make:seeder UsersTableSeeder

~~~~

~~~~
php artisan db:seed

php artisan db:seed --class=CustomerTableSeeder

php artisan db:seed --class=ProjectTableSeeder

php artisan db:seed --class="EffortTableSeeder"

php artisan db:seed --class="EstimationTableSeeder"

php artisan migrate:refresh --seed
~~~~

# Create Models from database
- Install package Krlove

> composer require krlove/eloquent-model-generator --dev

Using : 
~~~~
php artisan krlove:generate:model Users --table-name=users

php artisan krlove:generate:model Currency --table-name=currency

php artisan krlove:generate:model Country --table-name=country

php artisan krlove:generate:model SwiftCode --table-name=swift_code

php artisan krlove:generate:model Customer --table-name=t_customer

php artisan krlove:generate:model Project --table-name=t_project

php artisan krlove:generate:model Account --table-name=t_account

php artisan krlove:generate:model AccountSession --table-name=t_account_session

php artisan krlove:generate:model Estimation --table-name=t_estimation

php artisan krlove:generate:model Effort --table-name=t_effort

php artisan krlove:generate:model Invoice --table-name=t_invoice

php artisan krlove:generate:model InvoiceDetail --table-name=t_invoice_detail

php artisan krlove:generate:model Rate --table-name=t_rate

php artisan krlove:generate:model Cost --table-name=t_cost


~~~~
With 

Customer --> name of Model
--table-name=customer --> table in database

# Eloquent: API Resources
##Step 1: Create table with migration and seeder (for data sample)

##Step 2: Create Model with artisan make:model

##Step 3: Create Controller with artisan make:comtroller  X_Controller 

##Step 4: Create Routes/API  

##Step 5: Create Resource with artisan make:resource X 
> php artisan make:resource CountryResource

> php artisan make:resource CountryResource --collection

* Create controller with default function (index, create, store, show, edit, update, detroy)

> php artisan make:controller CountryController --resource

>php artisan make:controller Api/CurrencyController --resource

>php artisan make:controller Api/ProjectController --resource

* Re-Create one table using migrate
>php artisan migrate:refresh --path=/database/migrations/2019_05_02_165125_create_table_country

# Create fake data for testing
- Prerequisite
    1. Create table
    2. Make a model
## Step 1 : 
Using Faker for generate data (if model was existed)
> php artisan make:factory CustomerFactory --model="App\Customer"

##Step 2 : Call seeder by command line (never call seeder in DatabaseSeeder Class)
> php artisan db:seed --class=ProjectTableSeeder

# Authentication
- Prerequisite
>php artisan make:auth

Folder structure of Authentication
~~~~
/app
    /Http
        /Controller
            /Auth
            HomeController.php
    Users.php
                
/resources
    /views
        /auth
            /passwords
            login.blade.php
            logout/blade.php

    
~~~~

# Laravel CORS

>composer require "barryvdh/laravel-cors"

# Installing Laravel DataTables
[Document](https://yajrabox.com/docs/laravel-datatables/master)
##Step1: 
Run the following command in your project to get the latest version of the package:
>composer require yajra/laravel-datatables-oracle
##Step2:
Open the file config/app.php and then add following service provider.
~~~~
'providers' => [
    // ...
    Yajra\DataTables\DataTablesServiceProvider::class,
],
~~~~
##Step3:
After completing the step above, use the following command to publish configuration & assets:
>php artisan vendor:publish --tag=datatables


#API Authentication 
[Document](https://laravel.com/docs/5.8/api-authentication)

# Cache
Reoptimized class loader:
>php artisan optimize

Clear Cache facade value:
>php artisan cache:clear

Clear Route cache:
>php artisan route:cache

Clear View cache:
>php artisan view:clear

Clear Config cache:
>php artisan config:clear

~~~~
php artisan config:clear
php artisan view:clear
php artisan route:cache
php artisan cache:clear
php artisan optimize
~~~~

# GIT branching model - Operational policy 
[Document](https://nvie.com/posts/a-successful-git-branching-model/)
## Rules
Rules for creating branches
In the case of new development, create it on a screen basis
Naming convention: feature/[screen ID/screen name]
Commit: Make it functional unit
ex:
Branch name: feature/customer_registration_screen
Commit: [feat] customer registration function development
Commit: [feat] Develop customer registration part of external system

When releasing, create a branch for release (created and merged each time at the time of release)
Naming convention: release_yyyymmdd_[environment]
Commit: Make it functional unit
release_yyyymmdd_[environment]
ex:
release_yyyymmdd_production
release_yyyymmdd_staging
##Operational policy 
- Commit message prefix
- Prefix 
| feat          | (formatting, missing semi colons, etc; no production code change)       | 
| fix           | (bug fix for the user, not a fix to a build script)                     |
| docs          | (changes to the documentation)                                          |
| style         | (formatting, missing semi colons, etc; no production code change)       |
| refactor      | (refactoring production code, eg. renaming a variable)                  |
| test          | (adding missing tests, refactoring tests; no production code change)    |
| chore         | chore (updating grunt tasks etc; no production code change)             |
    
##Git Branch Naming Conventions
- The main branches :
    - master
    - develop 
    - feature
    - release
- Branch naming convention:
    - anything except master, develop, release-*, or hotfix-*
    - hotfix-*
    - release-*





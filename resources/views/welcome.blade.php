<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>  
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
        <!-- Bootstrap CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">            
    </head>

    <body class="antialiased">
    
        <section class="vh-100 gradient-custom">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">

                    <div class="card">
                    <div class="card-body p-5">

                        <form  method="post" action="{{ route('saveItem') }}" 
                        class="d-flex justify-content-center align-items-center mb-4"> 
                        {{ csrf_field() }}
                        <div class="form-outline flex-fill">
                            <input type="text" name="name" id="name" class="form-control"  placeholder='New task...'/>
                        </div>
                        <button type="submit" class="btn btn-info ms-2  mb-4">Add</button>
                        </form>

                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="{{ route('index') }}" role="tab"
                            aria-controls="ex1-tabs-2" aria-selected="false">Active</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab"  href="{{ route('completed') }}"role="tab"
                            aria-controls="ex1-tabs-3" aria-selected="false">Completed</a>
                        </li>
                        </ul>
                        <!-- Tabs navs -->

                        <!-- Tabs content -->
                        <div class="tab-content" id="ex1-content">
                        <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                            aria-labelledby="ex1-tab-1">
                            <ul class="list-group mb-0">
                            @forelse ($listItems as $listItem)
                            <li class="list-group-item d-flex justify-content-between align-items-center border-start-0 border-top-0 border-end-0 border-bottom rounded-0 mb-2""
                                style="background-color: #f4f6f7;">
                                @if ($listItem->is_complete)
                        
                                <div class="d-flex align-items-center">
                                    <form class="col" method="post" action="{{ route('markAsComplete', $listItem->id) }}">
                                        {{ csrf_field() }}
                                        <input 
                                        onChange="this.form.submit()"
                                        type="checkbox" 
                                        name="is_complete" 
                                        class="form-check-input" 
                                        {{ $listItem->is_complete ? 'checked' : '' }}>
                                    </form> 
                                <label class="form-check-label ms-2"><s>{{ $listItem->name }}</s></label> 
                                
                                </div> 
                                
                                <form  method="post" action="{{ route('deleteItem', $listItem->id) }}">
                                    {{ csrf_field() }}
                                    <button 
                                    type="submit" 
                                    class="btn-close" aria-label="Close">
                                    </button>
                                </form> 
                                @else
                                <div class="d-flex align-items-center">
                                    <form class="col" method="post" action="{{ route('markAsComplete', $listItem->id) }}">
                                        {{ csrf_field() }}
                                        <input 
                                        onChange="this.form.submit()"
                                        type="checkbox" 
                                        name="is_complete" 
                                        class="form-check-input" 
                                        {{ $listItem->is_complete ? 'checked' : '' }}>
                                    </form> 
                                <label class="form-check-label ms-2">{{ $listItem->name }}</label> 
                                
                                </div> 
                                
                                <form  method="post" action="{{ route('deleteItem', $listItem->id) }}">
                                    {{ csrf_field() }}
                                    <button 
                                    type="submit" 
                                    class="btn-close" aria-label="Close">
                                    </button>
                                </form> 
                                @endif
                                
                            </li>
                            @empty
                            <li>
                            <div class="alert alert-danger" role="alert">
                                No Items Saved Yet
                            </div>     
                            </li>             
                            @endforelse
                            </ul>
                        </div>
                        
                        </div>
                        <!-- Tabs content -->

                    </div>
                    </div>

                </div>
                </div>
            </div>
            </section>


    </body>
</html>

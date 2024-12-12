<x-layout>
     @include('partials._navbar')
     <div class="space"></div>
       <div class="container" >
          @include('partials._search')

          <div class="card my-5">
               <div class="card-header">
                 <h3 class="card-category text-center">
                   آنالیز سنگ</h3>
               </div>
               <div class="card-body">
                 <div class="table-responsive">
                   <table class="table text-center">
                     <thead >
                       <th class="text-end">نام</th>
                       <th>کد</th>
                       <th>نوع</th>
                       <th>مقاومت کششی</th>
                       <th> میزان جذب آب</th>
                       <th>مقاومت فشاری</th>
                       <th>مقاومت سایشی</th>
                       <th>وزن مخصوص</th>
                       <th>مدل گسیختگی</th>
                       <th>تخلخل</th>
                     </thead>
                     <tbody>
                        
                         <tr  >
                             <td class="text-end">{{$stone['name']}}</td>
                             <td >{{$stone['code']}}</td>
                             <td >{{$stone->stoneType->name}}</td>
                             <td >{{$stone['Tensile_Strength']}}</td>
                             <td >{{$stone['Water_Absorption_Rate']}}</td>
                             <td >{{$stone['Compressive_Strength']}}</td>
                             <td >{{$stone['Abrasion_Resistance']}}</td>
                             <td >{{$stone['Specific_Weight']}}</td>
                             <td >{{$stone['Failure_Mode']}}</td>
                             <td >{{$stone['Porosity']}}</td>
                         </tr>
                     </tbody>
                   </table>
                 </div>
               </div>
             </div>
          <div class="row my-5">
               <div class="col-md-8">
                    <img class="w-100" src="{{asset('storage/'.$stone->image)}}" alt="" srcset="">
                
               </div>
               <div class="col-md-4">
                    @if(count($relatedStones)!=0) 
                   @foreach ($relatedStones as $relatedStone)
                     <img class="w-100" src="{{asset('storage/'.$relatedStone->image)}}" alt="" srcset="">
                     <a class="h5 nav-link fw-bold text-dark" href="/articles/{{$relatedStone->id}}">{{$relatedStone->code}} _ {{$relatedStone->name}}</a>
                   <hr>
                   @endforeach
                  @endif 
               </div>
          </div>
           
          </div>
    </x-layout>
 <div class="row tgiathi" >
                        <div class="col-md-2 socauhoi">
                           
                        </div>
                        <div class="col-md-7 cauhoi">
                        
                      <p>{{$dethi->kythi->tenky}}</p>
                               @foreach($ctdethi as $ct)
                                 
                                    <table class="table table-bordered" style="font-size: 13px;margin-top: 40px">
                                        <thead>
                                                
                                            <tr>
                                                    <td class="todam">Mã câu hỏi</td>
                                                    <td> {{ $ct->id_cauhoi}}</td>
                                            </tr>
                                         
                                        </thead>
                                        <tbody>
                                              <tr>
                                                <td class="todam">Nội dung</td>
                                                <td> {{$ct->noidung}}</td>
                                            </tr>
                                            <tr>
                                                <td class="todam">A</td>
                                                <td>{{$ct->a}}</td>
                                            </tr>
                                            <tr>
                                                <td class="todam">B</td>
                                                <td>{{$ct->b}}</td>
                                            </tr>
                                            <tr>
                                                <td class="todam">C</td>
                                                <td>{{$ct->c}}</td>
                                                
                                            </tr>
                                            <tr>
                                                <td class="todam">D</td>
                                                <td>{{$ct->d}}</td>
                                            </tr>
                                           
                                           {{--  <tr>
                                                <td class="todam">Đáp án đúng</td>
                                                <td>
                                                	@foreach($dapan as $da )
														<span>
															&nbsp; &nbsp;<span id="dad">{{ $da['noidung'] }}</span> &nbsp; &nbsp;
														</span>
													@endforeach
                                                </td>
                                            </tr> --}}
                                        </tbody>
                                      </table>
                                     @endforeach
                        </div>
                       
                    
                    </div>

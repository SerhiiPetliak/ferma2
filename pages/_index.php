

<?php
$db->Query("SELECT * FROM db_config");
$config = $db->FetchArray();
?>
<?php include("index_goo.php");?>
<div class="wrapper">
<div style="margin-top:0px;" class="container">
<div class="farmer">
<div class="main_wrapper">
	<div class="main_market">
	<span class="title aligncenter">Магазин</span>
		<span class="rates_list">
			<ul>
				<li class="tips" style="width:200px !important;" original-title="Курица">
					<div class="main_rate_w"><img class="fa_icon" src="/images/animals/1.png"></div> 
					<div class="equals">=</div> 
					<div class="main_pr">
						<?=$config['amount_a_t'];?>                                                
					</div>
					<img width="31" class="p_m_left" src="/images/gold.png">
				</li>
				<li class="tips" style="width:200px !important;" original-title="Свинья">
					<div class="main_rate_w"><img class="fa_icon" src="/images/animals/2.png"></div> 
					<div class="equals">=</div> 
					<div class="main_pr">
						<?=$config['amount_b_t'];?>                                                
					</div>
					<img width="31" class="p_m_left" src="/images/gold.png">
				</li>
				<li class="tips" style="width:200px !important;" original-title="Овца">
					<div class="main_rate_w"><img class="fa_icon" src="/images/animals/3.png"></div> 
					<div class="equals">=</div> 
					<div class="main_pr">
						<?=$config['amount_c_t'];?>                                                
					</div>
					<img width="31" class="p_m_left" src="/images/gold.png">
				</li>
				<li class="tips" style="width:200px !important;" original-title="Коза">
					<div class="main_rate_w"><img class="fa_icon" src="/images/animals/4.png"></div> 
					<div class="equals">=</div> 
					<div class="main_pr">
						<?=$config['amount_d_t'];?>                                                
					</div>
					<img width="31" class="p_m_left" src="/images/gold.png">
				</li>
				<li class="tips" style="width:200px !important;" original-title="Корова">
					<div class="main_rate_w"><img class="fa_icon" src="/images/animals/5.png"></div> 
					<div class="equals">=</div> 
					<div class="main_pr">
						<?=$config['amount_e_t'];?>                                                
					</div>
					<img width="31" class="p_m_left" src="/images/gold.png">
				</li>
			</ul>																																																																																																																																																																																																																																																																																																																																	</ul>
		</span>
	</div>
	<div class="regpanel">
		<div class="farmerville"></div>
		<div class="left_h">
			<div class="title aligncenter">Как работает MR.Farmer?</div>
			<ul>
				<li>
					<div class="number">1.</div>
					<div class="hint">Mr.Farmer это своего рода социальная сеть виртуальных фермеров интернета!</div>
				</li>
				<li>
					<div class="number">2.</div>
					<div class="hint">
					
Почему мы так говорим - потому что мы предоставляем полную открытость для пользователей которые учавствуют в проектах
экономических игр! 

					</div>
				</li>
				<li>
					<div class="number">3.</div>
					<div class="hint">
					Кроме того что мы имеем собственную ферму, где вы можете покупать и продавать животных, обменивать на золото и получить прибыль,
вы также можете общаться с другими пользователями.
					</div>
				</li>
				<li>
					<div class="number">4.</div>
					<div class="hint">
					У нас полностью открыт доступ к общению и пользователям проекта в чате и внутренней почте! К обсуждению других ферм и происходящего на сайте!

					</div>
				</li>
				<li>
					<div class="number">5.</div>
					<div class="hint">
				Также на сайте есть возможность заработать просматривая сайты рекламодателей в серфинге, выполнять задания, пользоваться модерируемым ротатором Bitcoin кранов.
Рекламодатели имеют возможность заказать рекламу!</li>
				
			</ul>
		</div>
	</div>

	<div class="main_rates">
		<span class="title aligncenter">Рынок</span>
		<span class="rates_list">
		<ul>
		<li class="tips" style="width:200px !important;" original-title="Яйцо">
			<div class="main_rate_w"><img class="fa_icon" src="/images/animals/1.png"></div> 
			<div class="equals">=</div> <?=$config['a_in_h'];?> 
			<img width="30" class="p_m_left" src="/images/eggs.png"> 
		</li>
		<li class="tips" style="width:200px !important;" original-title="Мясо">
			<div class="main_rate_w"><img class="fa_icon" src="/images/animals/2.png"></div> 
			<div class="equals">=</div> <?=$config['b_in_h'];?> 
			<img width="30" class="p_m_left" src="/images/meat.png"> 
		</li>
		<li class="tips" style="width:200px !important;" original-title="Шерсть">
			<div class="main_rate_w"><img class="fa_icon" src="/images/animals/3.png"></div> 
			<div class="equals">=</div> <?=$config['c_in_h'];?> 
			<img width="30" class="p_m_left" src="/images/wool.png"> 
		</li>
		<li class="tips" style="width:200px !important;" original-title="Молоко козы">
			<div class="main_rate_w"><img class="fa_icon" src="/images/animals/4.png"></div> 
			<div class="equals">=</div> <?=$config['d_in_h'];?> 
			<img width="30" class="p_m_left" src="/images/milk.png"> 
		</li>
		<li class="tips" style="width:200px !important;" original-title="Молоко коровы">
			<div class="main_rate_w"><img class="fa_icon" src="/images/animals/5.png"></div> 
			<div class="equals">=</div> <?=$config['e_in_h'];?> 
			<img width="30" class="p_m_left" src="/images/milk.png"> 
		</li>
		</ul>																																																																					 </ul>
		</span>
	</div>
</div>

</div>
   <?php if(empty($_SESSION["user"])){ ?>
         <div class="register_login">
                <div class="left_login">
                        <div class="title aligncenter">Присоединяйтесь к нам:</div>
                        <div class="intro">
                            <div class="because_wrap">
                                <div class="m_1"></div>
                                <div class="because_text">
                                    
                                </div>
                            </div>
                            <div class="because_wrap">
                                <div class="m_2"></div>
                                <div class="because_text">
                                    Первое пополнение +500 золота на счет для покупок!
                                </div>
                            </div>
                            <div class="because_wrap">
                                <div class="m_3"></div>
                                <div class="because_text">
                                    Партнерская програма подразумевает получение 10% дохода на счет для вывода с пополнений и выполнения заданий и серфинга вашим рефералом!
									Также 10% от акционных бонусов выдаваемых пользователям при первом пополнении!
							   
                            <hr>
                            
Предполагаемая прибыль от развития вашей фермы колеблется от 15 до 30% в месяц, без учета партнерской программы!
Кому то может мало ))) Мы не являемся ни пирамидой, ни инвестиционным хайпом, а просто расчитываем свои силы!
                                </div>
                            </div>
                        </div>
                      
                </div>
				<div style="font-size: 12px">
Проверяйте адрес сайта перед входом <b style="font-size: 16px; color: Orange">"mr-farmer.biz"</b><br>
Мы не имеем никакого отношения к сайтам с подобным дизайном и другими доменными именами!</div>
<hr>
<div style="font-size: 12px; color: #228B22">После входа на сайт не забывайте читать раздел "Новости", и будьте всегда в курсе происходящего на сайте!</div>
<hr>
				<div class="right_login">
                    <div class="title_r">Вход</div>
                        <form name="loginform" action="/login.html" method="post">
						<input name="login" type="text" value="<?=(isset($_POST["login"])) ? htmlspecialchars($_POST["login"]) : false; ?>" placeholder="Пользователь" class="input_text"/> 
						<input name="email" type="text" placeholder="E-mail" value="<?=(isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : false; ?>" class="input_text"/>
						<input name="pass" type="password" placeholder="Пароль" class="input_text"/></td>
						<div class="clear"></div>
						<input type="submit" class="subm_button" value="Вход" name="loginform">
						</form>
                        <div class="clear"></div>
                        <div class="s_divide"></div> 
                        <div class="title_r">Регистрация</div>
						<form name="singup" method="post" action="/signup.html">
						<input type="text" placeholder="Пользователь"  value="<?=(isset($_POST["login"])) ? htmlspecialchars($_POST["login"]) : false; ?>" name="login" class="input_text"/>
						<input type="text" placeholder="E-mail" value="<?=(isset($_POST["email"])) ? htmlspecialchars($_POST["email"]) : false; ?>"/ name="email" class="input_text"/>
						<input type="password" placeholder="Пароль" value="" name="password" class="input_text"/>
						<input type="password" placeholder="Подтвердить пароль" value="" name="re_password" class="input_text"/>
						<div class="clear"></div>
						<div class="terms_main">
						<input type="checkbox" name="rules"/> <label for="terms">Я прочитал и соглашаюсь с <a href="/rules.html" target="_blank">условиями</a> использования сайта</label>
						<hr>
						<div style="font-size: 12px; color: #CD5C5C">Внимание! Создание мультиаккаунтов повлечет за собой удаление таковых без предупреждения, без возврата средств и возможности востановления!</div>
						</div>
						<input type="submit" class="subm_button" value="Регистрация" name="singup"/>
						</form>
						
                </div>
				
        </div>
		<?php } ?>
    </div>
</div>


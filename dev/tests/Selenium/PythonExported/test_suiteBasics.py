# Generated by Selenium IDE
import pytest
import time
import json
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.common.action_chains import ActionChains
from selenium.webdriver.support import expected_conditions
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities

class TestSuiteBasics():
  def setup_method(self, method):
    desired_capabilities = DesiredCapabilities.CHROME.copy()
    desired_capabilities['acceptInsecureCerts'] = True
    
    self.driver = webdriver.Remote(command_executor='http://seleniumchrome:4444/wd/hub', desired_capabilities=desired_capabilities)
    self.vars = {}
  
  def teardown_method(self, method):
    self.driver.quit()
  
  def wait_for_window(self, timeout = 2):
    time.sleep(round(timeout / 1000))
    wh_now = self.driver.window_handles
    wh_then = self.vars["window_handles"]
    if len(wh_now) > len(wh_then):
      return set(wh_now).difference(set(wh_then)).pop()
  
  def test_loginBasico(self):
    self.driver.get("<<PROTOCOLO>>://<<HOST>>/sip/login.php?sigla_orgao_sistema=ABC&sigla_sistema=SEI&infra_url=L3NlaS8=")
    WebDriverWait(self.driver, 30).until(expected_conditions.element_to_be_clickable((By.ID, "txtUsuario")))
    self.driver.find_element(By.ID, "txtUsuario").send_keys("teste")
    self.driver.find_element(By.ID, "pwdSenha").click()
    self.driver.find_element(By.ID, "pwdSenha").send_keys("<<SENHA>>")
    self.driver.find_element(By.XPATH, "//*[@id='sbmAcessar'] | //*[@id='Acessar']").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//div[@id=\'divControleProcessosConteudo\']/div[2]")))
    elements = self.driver.find_elements(By.XPATH, "//div[@id=\'divControleProcessosConteudo\']/div[2]")
    assert len(elements) > 0
    self.driver.find_element(By.LINK_TEXT, "Infra").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//span[contains(.,\'Módulos\')]")))
    self.driver.find_element(By.XPATH, "//span[contains(.,\'Módulos\')]").click()
    #WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.ID, "divInfraBarraLocalizacao")))
    #WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//td[contains(.,\'Módulo de Estatisticas do SEI\')]")))
    #elements = self.driver.find_elements(By.XPATH, "//td[contains(.,\'Módulo de Estatisticas do SEI\')]")
    #assert len(elements) > 0
    #self.driver.find_element(By.XPATH, "//span[contains(.,\'Agendamentos\')]").click()
    #WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//td[contains(.,\'MdEstatisticasAgendamentoRN :: coletarIndicadores\')]")))
    #elements = self.driver.find_elements(By.XPATH, "//td[contains(.,\'MdEstatisticasAgendamentoRN :: coletarIndicadores\')]")
    #assert len(elements) > 0
    self.driver.find_element(By.XPATH, "//span[contains(.,\'Iniciar Processo\')]").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.LINK_TEXT, "Arrecadação: Cobrança")))
    self.driver.find_element(By.LINK_TEXT, "Arrecadação: Cobrança").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.ID, "txtDescricao")))
    self.driver.find_element(By.ID, "txtDescricao").click()
    self.driver.find_element(By.ID, "txtDescricao").send_keys("teste")
    self.driver.find_element(By.CSS_SELECTOR, "#divOptPublico .infraRadioLabel").click()
    self.driver.find_element(By.CSS_SELECTOR, "#divInfraBarraComandosInferior > #btnSalvar").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//iframe[@id=\'ifrArvore\']")))
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//iframe[@id=\'ifrVisualizacao\'] | //iframe[@id=\'ifrConteudoVisualizacao\']")))
    
    elements = self.driver.find_elements(By.XPATH, "//iframe[@id=\'ifrConteudoVisualizacao\']")
    self.bolSei41 = len(elements) > 0
    
    self.driver.switch_to.frame(1)
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//img[@alt=\'Incluir Documento\']")))
    self.driver.find_element(By.XPATH, "//img[@alt=\'Incluir Documento\']").click()
    
    if(self.bolSei41):
        time.sleep(5)
        self.driver.switch_to.default_content()
        self.driver.switch_to.frame(self.driver.find_element(By.XPATH, "//iframe[@id='ifrConteudoVisualizacao']"))
        self.driver.switch_to.frame(self.driver.find_element(By.XPATH, "//iframe[@id='ifrVisualizacao']"))
    
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//a[text()='Despacho']")))
    self.driver.find_element(By.XPATH, "//a[text()='Despacho']").click()
    self.driver.find_element(By.CSS_SELECTOR, "#divOptPublico .infraRadioLabel").click()
    self.vars["window_handles"] = self.driver.window_handles
    self.driver.find_element(By.CSS_SELECTOR, "#divInfraBarraComandosInferior > #btnSalvar").click()
    self.vars["win1687"] = self.wait_for_window(5000)
    self.vars["root"] = self.driver.current_window_handle
    self.driver.switch_to.window(self.vars["win1687"])
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//form[@id=\'frmEditor\']")))
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//form[@id=\'frmEditor\']/div[2]/div[4]/div/div/iframe")))
    time.sleep(2)
    self.driver.close()
    self.driver.switch_to.window(self.vars["root"])
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//iframe[@id=\'ifrArvore\']")))
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//iframe[@id=\'ifrVisualizacao\'] | //iframe[@id=\'ifrConteudoVisualizacao\']")))
    self.driver.switch_to.frame(1)
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//img[@alt=\'Incluir Documento\']")))
    self.driver.find_element(By.XPATH, "//img[@alt=\'Incluir Documento\']").click()
    
    if(self.bolSei41):
        time.sleep(5)    
        self.driver.switch_to.default_content()
        self.driver.switch_to.frame(self.driver.find_element(By.XPATH, "//iframe[@id='ifrConteudoVisualizacao']"))
        self.driver.switch_to.frame(self.driver.find_element(By.XPATH, "//iframe[@id='ifrVisualizacao']"))
    
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.LINK_TEXT, "Externo")))
    self.driver.find_element(By.LINK_TEXT, "Externo").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.element_to_be_clickable((By.ID, "selSerie")))
    self.driver.find_element(By.ID, "selSerie").click()
    dropdown = self.driver.find_element(By.ID, "selSerie")
    dropdown.find_element(By.XPATH, "//option[. = 'Abaixo-Assinado']").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.ID, "filArquivo")))
    self.driver.find_element(By.ID, "txtDataElaboracao").click()
    self.driver.find_element(By.ID, "txtDataElaboracao").send_keys("03/09/2020")
    self.driver.find_element(By.CSS_SELECTOR, "#divOptNato .infraRadioLabel").click()
    self.driver.find_element(By.CSS_SELECTOR, "#divOptPublico .infraRadioLabel").click()
    self.driver.find_element(By.ID, "filArquivo").send_keys("teste.pdf")
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//form[@id=\'frmAnexos\']")))
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//iframe[@id=\'ifrfrmAnexos\']")))
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//form[@id=\'frmAnexos\']/div[2]/table/tbody/tr[1]/td[2]")))
    self.driver.find_element(By.CSS_SELECTOR, "#divInfraBarraComandosInferior > #btnSalvar > .infraTeclaAtalho").click()
    self.driver.switch_to.default_content()
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//iframe[@id=\'ifrArvore\']")))
    WebDriverWait(self.driver, 30).until(expected_conditions.presence_of_element_located((By.XPATH, "//iframe[@id=\'ifrVisualizacao\'] | //iframe[@id=\'ifrConteudoVisualizacao\']")))
    self.driver.find_element(By.XPATH, "//div[@id='divInfraBarraSistemaPadrao']/div/div/button | //div[@id='divInfraBarraSistemaPadrao']/div/div/a[@id='lnkInfraMenuSistema']").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//ul[@id=\'infraMenu\']/li[8]/a/span")))
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//ul[@id='infraMenu']//span[text()='Controle de Processos']")))
    self.driver.find_element(By.XPATH, "//ul[@id='infraMenu']//span[text()='Controle de Processos']").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.XPATH, "//a[contains(.,\'99990\')]")))
    elements = self.driver.find_elements(By.XPATH, "//a[contains(.,\'99990\')]")
    assert len(elements) > 0
    self.driver.find_element(By.XPATH, "//a[@id='lnkSairSistema'] | //a[@id='lnkInfraSairSistema']").click()
    WebDriverWait(self.driver, 30).until(expected_conditions.visibility_of_element_located((By.ID, "txtUsuario")))
    elements = self.driver.find_elements(By.ID, "txtUsuario")
    assert len(elements) > 0
  

import datetime
import threading
from logical.Control import Control
from logical.Grupo import Grupo

code = "" 
control = Control()
grupo_ahora = None

def getDate():
    return datetime.datetime.strptime(str(datetime.datetime.now()), '%Y-%m-%d %H:%M:%S.%f')

threads = list()
while code != "exit()":
    now = getDate()
    if grupo_ahora == None:
        grupo_ahora = control.getGrupoActual(now)
    code = input()
    if grupo_ahora != None:
        index = grupo_ahora.estudianteByMatricula(code)
        if index != -1:
            print(grupo_ahora.get_estudiantes()[index].get_nombre())
    else:
        continue  
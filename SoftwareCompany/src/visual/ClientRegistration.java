package visual;

import java.awt.BorderLayout;
import java.awt.FlowLayout;

import javax.swing.JButton;
import javax.swing.JDialog;
import javax.swing.JFileChooser;
import javax.swing.JFormattedTextField;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import java.awt.Toolkit;

import javax.swing.AbstractButton;
import javax.swing.ImageIcon;
import javax.swing.border.EtchedBorder;
import javax.swing.border.TitledBorder;
import javax.swing.filechooser.FileFilter;
import javax.swing.filechooser.FileNameExtensionFilter;
import javax.swing.text.MaskFormatter;

import logical.Client;
import logical.SoftwareCompany;

import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JTextField;
import java.awt.Font;
import java.awt.Image;

import javax.swing.SwingConstants;
import java.awt.event.FocusAdapter;
import java.awt.event.FocusEvent;
import java.awt.event.KeyAdapter;
import java.awt.event.KeyEvent;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import java.io.File;

public class ClientRegistration extends JDialog {

	private Validation validation = new Validation();
	private final JPanel contentPanel = new JPanel();
	private JTextField txtCodigo;
	private JTextField txtCedula;
	private JTextField txtTelefono;
	private JTextField txtDireccion;
	private JTextField txtNombres;
	private JTextField txtApellidos;
	private JTextField txtCorreo;
	private JTextField txtCantProyectos;
	private JTextField txtFechaRegistro;
	private JButton btnGuardar;
	private JButton btnSalir;
	private JButton btnEditCedula;
	private JLabel lblImagen;
	private Client client;
	
	public ClientRegistration() {
		setFont(new Font("SansSerif", Font.PLAIN, 14));
		setIconImage(Toolkit.getDefaultToolkit().getImage(ClientRegistration.class.getResource("/Imgs/user.png")));
		setTitle("Registrar Cliente");
		setResizable(false);
		setBounds(100, 100, 401, 417);
		setLocationRelativeTo(null);
		getContentPane().setLayout(new BorderLayout());
		contentPanel.setBorder(new EmptyBorder(5, 5, 5, 5));
		getContentPane().add(contentPanel, BorderLayout.CENTER);
		contentPanel.setLayout(null);
		
		JPanel panel = new JPanel();
		panel.setBorder(new TitledBorder(new EtchedBorder(EtchedBorder.RAISED, null, null), "Informaci\u00F3n General", TitledBorder.LEADING, TitledBorder.TOP, null, null));
		panel.setBounds(10, 11, 375, 329);
		contentPanel.add(panel);
		panel.setLayout(null);
		
		JLabel lblCdigo = new JLabel("C\u00F3digo:");
		lblCdigo.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblCdigo.setBounds(138, 25, 57, 19);
		panel.add(lblCdigo);
		
		JLabel lblNombres = new JLabel("Nombres:");
		lblNombres.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblNombres.setBounds(10, 141, 68, 14);
		panel.add(lblNombres);
		
		JLabel lblApellidos = new JLabel("Apellidos:");
		lblApellidos.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblApellidos.setBounds(10, 181, 68, 19);
		panel.add(lblApellidos);
		
		JLabel lblCedula = new JLabel("Cedula:");
		lblCedula.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblCedula.setBounds(138, 64, 57, 14);
		panel.add(lblCedula);
		
		JLabel lblDireccin = new JLabel("Direcci\u00F3n:");
		lblDireccin.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblDireccin.setBounds(10, 222, 68, 14);
		panel.add(lblDireccin);
		
		JLabel lblTelfono = new JLabel("Tel\u00E9fono:");
		lblTelfono.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblTelfono.setBounds(138, 104, 68, 14);
		panel.add(lblTelfono);
		
		JLabel lblCorreo = new JLabel("Correo:");
		lblCorreo.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblCorreo.setBounds(10, 260, 57, 14);
		panel.add(lblCorreo);
		
		txtCodigo = new JTextField();
		txtCodigo.setHorizontalAlignment(SwingConstants.RIGHT);
		txtCodigo.setEditable(false);
		txtCodigo.setBounds(205, 24, 101, 20);
		txtCodigo.setText("CL-" + (SoftwareCompany.codClients + 1));
		panel.add(txtCodigo);
		txtCodigo.setColumns(10);
		
		JLabel lblProyectos = new JLabel("Proyectos:");
		lblProyectos.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblProyectos.setBounds(10, 296, 68, 19);
		panel.add(lblProyectos);
		
		MaskFormatter formatCedula = null;
		try {
			formatCedula = new MaskFormatter("###-#######-#");
			formatCedula.setPlaceholderCharacter('_');
			txtCedula = new JFormattedTextField(formatCedula);				
		} catch (Exception e) {
			txtCedula = new JTextField();
		}
		txtCedula.addKeyListener(new KeyAdapter() {
			@Override
			public void keyReleased(KeyEvent e) {
				if (!(e.getKeyChar() == 13 || (e.getKeyChar() >= 48 && e.getKeyChar()  <= 57))) {
					return;
				}
				String cedula = txtCedula.getText();
				if (!cedula.contains("_")) {
					txtCedula.setEditable(false);
					stateOfCampos(true);
					btnGuardar.setEnabled(true);
					client = SoftwareCompany.getInstance().clientById(cedula);
					if (client != null) {
						if (client.getPicture() == null) {
							lblImagen.setIcon(new ImageIcon(ClientRegistration.class.getResource("/com/sun/java/swing/plaf/windows/icons/UpFolder.gif")));
							lblImagen.setText("<Imagen>");
						} else {
							lblImagen.setIcon(client.getPicture());
						}
						txtCodigo.setText(client.getCode());
						txtTelefono.setText(client.getPhone());
						txtNombres.setText(client.getName());
						txtApellidos.setText(client.getLast_name());
						txtDireccion.setText(client.getAddress());
						txtCorreo.setText(client.getMail());
						txtCantProyectos.setText(client.getCant_projects() + "");
						txtFechaRegistro.setText((new SimpleDateFormat("yyyy/MM/dd")).format(client.getRegistration_date()));
						btnGuardar.setText("Modificar");
						setTitle("Modificar Cliente: " + cedula);
						btnEditCedula.setEnabled(false);
					} else {
						btnEditCedula.setEnabled(true);
					}
				txtTelefono.requestFocus();
				}
			}
		});
		txtCedula.addFocusListener(new FocusAdapter() {
			@Override
			public void focusGained(FocusEvent arg0) {
				validation.setFocusBackground(txtCedula, true);
			}
			@Override
			public void focusLost(FocusEvent e) {
				validation.setFocusBackground(txtCedula, false);
			}
		});
		txtCedula.setBounds(205, 63, 101, 20);
		panel.add(txtCedula);
		txtCedula.setColumns(10);
		
		MaskFormatter formatTelefono = null;
		try {
			formatTelefono = new MaskFormatter("(###) ###-####");
			formatTelefono.setPlaceholderCharacter('_');
			txtTelefono = new JFormattedTextField(formatTelefono);
		} catch (Exception e) {
			txtTelefono = new JTextField();
		}
		txtTelefono.addFocusListener(new FocusAdapter() {
			@Override
			public void focusGained(FocusEvent e) {
				validation.setFocusBackground(txtTelefono, true);
			}
			@Override
			public void focusLost(FocusEvent e) {
				validation.setFocusBackground(txtTelefono, false);
			}
		});
		txtTelefono.setEditable(false);
		txtTelefono.setBounds(205, 103, 160, 20);
		panel.add(txtTelefono);
		txtTelefono.setColumns(10);
		
		txtDireccion = new JTextField();
		txtDireccion.addKeyListener(new KeyAdapter() {
			@Override
			public void keyTyped(KeyEvent e) {
				validation.toUpperCase(e);
			}
		});
		txtDireccion.addFocusListener(new FocusAdapter() {
			@Override
			public void focusGained(FocusEvent e) {
				validation.setFocusBackground(txtDireccion, true);
			}
			@Override
			public void focusLost(FocusEvent e) {
				validation.setFocusBackground(txtDireccion, false);
			}
		});
		txtDireccion.setEditable(false);
		txtDireccion.setBounds(85, 221, 280, 20);
		panel.add(txtDireccion);
		txtDireccion.setColumns(10);
		
		txtNombres = new JTextField();
		txtNombres.addKeyListener(new KeyAdapter() {
			@Override
			public void keyTyped(KeyEvent e) {
				validation.justLetters(e);
			}
		});
		txtNombres.addFocusListener(new FocusAdapter() {
			@Override
			public void focusGained(FocusEvent e) {
				validation.setFocusBackground(txtNombres, true);
			}
			@Override
			public void focusLost(FocusEvent e) {
				validation.setFocusBackground(txtNombres, false);
			}
		});
		txtNombres.setEditable(false);
		txtNombres.setBounds(85, 140, 280, 20);
		panel.add(txtNombres);
		txtNombres.setColumns(10);
		
		txtApellidos = new JTextField();
		txtApellidos.addKeyListener(new KeyAdapter() {
			@Override
			public void keyTyped(KeyEvent e) {
				validation.justLetters(e);
			}
		});
		txtApellidos.addFocusListener(new FocusAdapter() {
			@Override
			public void focusGained(FocusEvent e) {
				validation.setFocusBackground(txtApellidos, true);
			}
			@Override
			public void focusLost(FocusEvent e) {
				validation.setFocusBackground(txtApellidos, false);
			}
		});
		txtApellidos.setEditable(false);
		txtApellidos.setBounds(85, 180, 280, 20);
		panel.add(txtApellidos);
		txtApellidos.setColumns(10);
		
		lblImagen = new JLabel("<Imagen>");
		lblImagen.setEnabled(false);
		lblImagen.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent arg0) {
				if (!lblImagen.isEnabled()) {
					return;
				}
				JFileChooser file = new JFileChooser();
		        file.setCurrentDirectory(new File(System.getProperty("user.home")));
		        FileNameExtensionFilter filter = new FileNameExtensionFilter("*.Images", "jpeg", "jpg", "gif", "png");
		        file.addChoosableFileFilter(filter);
		        file.setFileFilter(filter);
		        file.setAcceptAllFileFilterUsed(false);
		        int result = file.showSaveDialog(null);
		        if(result == JFileChooser.APPROVE_OPTION){
		        	File selectedFile = file.getSelectedFile();
		            String path = selectedFile.getAbsolutePath();
		            lblImagen.setIcon(ResizeImage(path));
		        }
			}
		});
		lblImagen.setBorder(new EtchedBorder(EtchedBorder.RAISED, null, null));
		lblImagen.setHorizontalAlignment(SwingConstants.CENTER);
		lblImagen.setIcon(new ImageIcon(ClientRegistration.class.getResource("/javax/swing/plaf/metal/icons/ocean/upFolder.gif")));
		lblImagen.setBounds(10, 25, 118, 97);
		panel.add(lblImagen);
		
		txtCorreo = new JTextField();
		txtCorreo.setEditable(false);
		txtCorreo.addKeyListener(new KeyAdapter() {
			@Override
			public void keyTyped(KeyEvent e) {
				validation.justMailCharacter(e);
			}
		});
		txtCorreo.addFocusListener(new FocusAdapter() {
			@Override
			public void focusGained(FocusEvent e) {
				validation.setFocusBackground(txtCorreo, true);
			}
			@Override
			public void focusLost(FocusEvent e) {
				validation.setFocusBackground(txtCorreo, false);
			}
		});
		txtCorreo.setBounds(85, 259, 280, 20);
		panel.add(txtCorreo);
		txtCorreo.setColumns(10);
		
		txtCantProyectos = new JTextField();
		txtCantProyectos.setText("0");
		txtCantProyectos.setHorizontalAlignment(SwingConstants.RIGHT);
		txtCantProyectos.setEditable(false);
		txtCantProyectos.setBounds(85, 295, 80, 20);
		panel.add(txtCantProyectos);
		txtCantProyectos.setColumns(10);
		
		JLabel lblRegistro = new JLabel("Registro:");
		lblRegistro.setFont(new Font("SansSerif", Font.PLAIN, 14));
		lblRegistro.setBounds(175, 295, 68, 17);
		panel.add(lblRegistro);
		
		txtFechaRegistro = new JTextField();
		txtFechaRegistro.setHorizontalAlignment(SwingConstants.RIGHT);
		txtFechaRegistro.setEditable(false);
		txtFechaRegistro.setBounds(245, 295, 120, 20);
		txtFechaRegistro.setText((new SimpleDateFormat("yyyy/MM/dd")).format(new Date()));
		panel.add(txtFechaRegistro);
		txtFechaRegistro.setColumns(10);
		
		btnEditCedula = new JButton("");
		btnEditCedula.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent arg0) {
				txtCedula.setEditable(true);
				btnEditCedula.setEnabled(false);
				stateOfCampos(false);
				btnGuardar.setEnabled(false);
				txtCedula.requestFocus();
			}
		});
		btnEditCedula.setEnabled(false);
		btnEditCedula.setIcon(new ImageIcon(ClientRegistration.class.getResource("/Imgs/iconfinder_Modify_132685.png")));
		btnEditCedula.setBounds(316, 62, 49, 23);
		panel.add(btnEditCedula);
		{
			JPanel buttonPane = new JPanel();
			buttonPane.setBorder(new EtchedBorder(EtchedBorder.RAISED, null, null));
			buttonPane.setLayout(new FlowLayout(FlowLayout.RIGHT));
			getContentPane().add(buttonPane, BorderLayout.SOUTH);
			{
				btnGuardar = new JButton("Guardar");
				btnGuardar.addActionListener(new ActionListener() {
					public void actionPerformed(ActionEvent arg0) {
						if (checkCampos()) {
							boolean registrado = false;
							String codigo = txtCodigo.getText();
							String cedula = txtCedula.getText();
							String telefono = txtTelefono.getText();
							String nombre = txtNombres.getText();
							String apellidos = txtApellidos.getText();
							String direccion = txtDireccion.getText();
							String correo = txtCorreo.getText();
							
							if (client == null) {
								client = new Client(codigo, cedula, nombre, apellidos, direccion, telefono, correo);
								storePicture();
								SoftwareCompany.getInstance().insertClient(client);
								registrado = true;
							} else {
								client.setName(nombre);
								client.setLast_name(apellidos);
								client.setMail(correo);
								client.setPhone(telefono);
								client.setAddress(direccion);
								storePicture();
								registrado = true;
							}
							
							if (registrado) {
								JOptionPane.showMessageDialog(null, "Operacion Exitosa", "Clientes", JOptionPane.INFORMATION_MESSAGE);
								clear();
							}
						}
					}

					private void storePicture() {
						if (lblImagen.getIcon() != (new ImageIcon(ClientRegistration.class.getResource("/com/sun/java/swing/plaf/windows/icons/UpFolder.gif")))) {
							client.setPicture((ImageIcon) lblImagen.getIcon());
						}
					}
				});
				btnGuardar.setIcon(new ImageIcon(ClientRegistration.class.getResource("/Imgs/save.png")));
				btnGuardar.setActionCommand("OK");
				buttonPane.add(btnGuardar);
				getRootPane().setDefaultButton(btnGuardar);
			}
			{
				btnSalir = new JButton("Salir");
				btnSalir.addActionListener(new ActionListener() {
					public void actionPerformed(ActionEvent arg0) {
						dispose();
					}
				});
				btnSalir.setIcon(new ImageIcon(ClientRegistration.class.getResource("/Imgs/exit.png")));
				btnSalir.setActionCommand("Cancel");
				buttonPane.add(btnSalir);
			}
		}
	}
	
	private ImageIcon ResizeImage(String ImagePath) {
        ImageIcon MyImage = new ImageIcon(ImagePath);
        Image img = MyImage.getImage();
        Image newImg = img.getScaledInstance(lblImagen.getWidth(), lblImagen.getHeight(), Image.SCALE_SMOOTH);
        ImageIcon image = new ImageIcon(newImg);
        return image;
    }
	
	private void stateOfCampos(boolean b) {
		txtTelefono.setEditable(b);
		txtNombres.setEditable(b);
		txtApellidos.setEditable(b);
		txtCorreo.setEditable(b);
		txtDireccion.setEditable(b);
		lblImagen.setEnabled(b);
	}
	
	private boolean checkCampos() {
		boolean validos = false;
		if (!txtCedula.getText().contains("_") && !txtNombres.getText().equalsIgnoreCase("") && !txtApellidos.getText().equalsIgnoreCase("") && !txtTelefono.getText().contains("_") && !txtDireccion.getText().equalsIgnoreCase("")) {
			validos = true;
		} else {
			JOptionPane.showMessageDialog(null, "Revise los campos", "Clientes", JOptionPane.INFORMATION_MESSAGE);
		}
		return validos;
	}
	
	private void clear() {
		txtCodigo.setText("CL-" + (SoftwareCompany.codClients + 1));
		txtCedula.setText("");
		txtTelefono.setText("");
		txtNombres.setText("");
		txtApellidos.setText("");
		txtDireccion.setText("");
		txtCorreo.setText("");
		txtCantProyectos.setText("0");
		txtFechaRegistro.setText((new SimpleDateFormat("yyyy/MM/dd")).format(new Date()));
		lblImagen.setIcon(new ImageIcon(ClientRegistration.class.getResource("/com/sun/java/swing/plaf/windows/icons/UpFolder.gif")));
		lblImagen.setText("<Imagen>");
		stateOfCampos(false);
		btnGuardar.setText("Guardar");
		setTitle("Registrar Clientes");
		btnEditCedula.setEnabled(false);
		txtCedula.setEditable(true);
		txtCedula.requestFocus();
	}
}
